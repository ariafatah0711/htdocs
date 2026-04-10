<?php
// Loader files can be filtered with .ignore (gitignore-like basic patterns).
$base = realpath(__DIR__);
$allowedExtensions = ['php', 'html', 'htm'];
// Exclude patterns: exact filenames, filename suffixes, and directories.
$excludeExact = [ltrim(str_replace('\\', '/', substr(__FILE__, strlen($base))), '/')];
$excludeSuffix = ['.bak'];
$excludeDirs = ['tmp'];

function normalizeRelPath($path) {
  $path = str_replace('\\', '/', trim($path));
  $path = preg_replace('#^\./+#', '', $path);
  return ltrim($path, '/');
}

function wildcardMatch($pattern, $path) {
  $quoted = preg_quote($pattern, '#');
  $regex = str_replace(['\\*\\*', '\\*', '\\?'], ['.*', '[^/]*', '[^/]'], $quoted);
  return (bool) preg_match('#^' . $regex . '$#i', $path);
}

function loadIgnoreRules($base) {
  $rules = [];
  $ignoreFile = $base . DIRECTORY_SEPARATOR . '.ignore';
  if (!is_file($ignoreFile)) {
    return $rules;
  }

  $lines = file($ignoreFile, FILE_IGNORE_NEW_LINES);
  if ($lines === false) {
    return $rules;
  }

  foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '' || strpos($line, '#') === 0) {
      continue;
    }

    $negate = false;
    if ($line[0] === '!') {
      $negate = true;
      $line = substr($line, 1);
    }

    $line = normalizeRelPath($line);
    if ($line === '') {
      continue;
    }

    $dirOnly = substr($line, -1) === '/';
    $line = rtrim($line, '/');
    if ($line === '') {
      continue;
    }

    $rules[] = [
      'pattern' => $line,
      'negate' => $negate,
      'dirOnly' => $dirOnly,
    ];
  }

  return $rules;
}

function isIgnoredByRules($relPath, $isDir) {
  $rules = $GLOBALS['ignoreRules'];
  if (empty($rules)) {
    return false;
  }

  $relPath = normalizeRelPath($relPath);
  if ($relPath === '') {
    return false;
  }

  $ignored = false;
  foreach ($rules as $rule) {
    $pattern = $rule['pattern'];
    $prefixMatch = ($relPath === $pattern) || (strpos($relPath, $pattern . '/') === 0);
    $match = false;

    if ($rule['dirOnly']) {
      $match = $prefixMatch;
    } else {
      $match = $prefixMatch
        || wildcardMatch($pattern, $relPath)
        || wildcardMatch($pattern, basename($relPath));
    }

    if ($match) {
      $ignored = !$rule['negate'];
    }
  }

  return $ignored;
}

function hasAllowedExtension($path) {
  $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
  return in_array($ext, $GLOBALS['allowedExtensions'], true);
}

function toDisplayPath($relPath) {
  $relPath = normalizeRelPath($relPath);
  $name = strtolower(basename($relPath));
  if (in_array($name, ['index.php', 'index.html', 'index.htm'], true)) {
    $dir = dirname($relPath);
    if ($dir === '.' || $dir === '') {
      return '/';
    }
    return str_replace('\\', '/', $dir) . '/';
  }
  return $relPath;
}

function isExcludedPath($relPath, $isDir = false) {
  $relPath = normalizeRelPath($relPath);
  $name = basename($relPath);

  if (in_array($relPath, $GLOBALS['excludeExact'], true)) {
    return true;
  }

  foreach ($GLOBALS['excludeSuffix'] as $suf) {
    if ($suf !== '' && substr($name, -strlen($suf)) === $suf) {
      return true;
    }
  }

  if ($isDir && in_array($name, $GLOBALS['excludeDirs'], true)) {
    return true;
  }

  return isIgnoredByRules($relPath, $isDir);
}

function scanProjectFiles($dir, $base) {
  $files = [];
  $items = scandir($dir);
  foreach ($items as $it) {
    if ($it === '.' || $it === '..') {
      continue;
    }

    $full = $dir . DIRECTORY_SEPARATOR . $it;
    $rel = normalizeRelPath(substr($full, strlen($base)));

    if (is_dir($full)) {
      if (isExcludedPath($rel, true)) {
        continue;
      }
      $files = array_merge($files, scanProjectFiles($full, $base));
      continue;
    }

    if (!hasAllowedExtension($full) || isExcludedPath($rel)) {
      continue;
    }

    $files[] = $rel;
  }

  sort($files);
  return $files;
}

$ignoreRules = loadIgnoreRules($base);

function safeResolve($base, $rel) {
    $candidate = realpath($base . DIRECTORY_SEPARATOR . $rel);
    if ($candidate === false) return false;
    $basePrefix = rtrim($base, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    if (strpos($candidate, $basePrefix) !== 0) return false;
    return $candidate;
}

$run = isset($_GET['run']) ? rawurldecode($_GET['run']) : null;
$view = isset($_GET['view']) ? rawurldecode($_GET['view']) : null;

if ($run) {
    $path = safeResolve($base, $run);
    $relPath = $path ? normalizeRelPath(substr($path, strlen($base))) : '';
    if ($path && is_file($path) && hasAllowedExtension($path) && !isExcludedPath($relPath)) {
        // Use iframe pointing to the relative URL so the file runs in its own context
        $src = htmlspecialchars(str_replace('\\', '/', $run));
        ?>
        <!doctype html>
        <html><head><meta charset="utf-8"><title>Run: <?php echo $src ?></title></head>
        <body>
        <p><a href="?">← Back to loader</a> • <a href="<?php echo $src ?>" target="_blank">Open in new tab</a></p>
        <h2>Running: <?php echo $src ?></h2>
        <iframe src="<?php echo $src ?>" style="width:100%;height:80vh;border:1px solid #ccc"></iframe>
        </body></html>
        <?php
        exit;
    }
    echo "Invalid or disallowed file.";
    exit;
}

if ($view) {
    $path = safeResolve($base, $view);
  $relPath = $path ? normalizeRelPath(substr($path, strlen($base))) : '';
  if ($path && is_file($path) && hasAllowedExtension($path) && !isExcludedPath($relPath)) {
        $code = file_get_contents($path);
        ?>
        <!doctype html>
        <html><head><meta charset="utf-8"><title>Source: <?php echo htmlspecialchars($view) ?></title>
        <style>pre{white-space:pre-wrap;word-break:break-word;background:#f7f7f7;padding:1rem;border:1px solid #ddd}</style>
        </head>
        <body>
        <p><a href="?">← Back to loader</a></p>
        <h2>Source: <?php echo htmlspecialchars($view) ?></h2>
        <pre><?php echo htmlspecialchars($code) ?></pre>
        </body></html>
        <?php
        exit;
    }
    echo "Invalid or disallowed file.";
    exit;
}

$files = scanProjectFiles($base, $base);

// Helper: format bytes (used in file list)
function formatBytes($bytes) {
  if ($bytes < 1024) return $bytes . ' B';
  $units = ['KB','MB','GB','TB'];
  $i = 0; $bytes /= 1024;
  while ($bytes >= 1024 && $i < 3) { $bytes /= 1024; $i++; }
  return round($bytes, 2) . ' ' . $units[$i];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Loader Pro</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
:root{
  --bg:#0f172a;
  --sidebar:#1e293b;
  --card:#111827;
  --primary:#6366f1;
  --text:#f1f5f9;
  --muted:#94a3b8;
  --border:#334155;
}

*{box-sizing:border-box}

body{
  margin:0;
  font-family:Inter,Segoe UI,system-ui;
  background:var(--bg);
  color:var(--text);
  height:100vh;
  display:flex;
}

.sidebar{
  width:300px;
  background:var(--sidebar);
  padding:20px;
  overflow-y:auto;
  border-right:1px solid var(--border);
}

.sidebar h2{
  margin-top:0;
}

.search{
  width:100%;
  padding:8px;
  margin-bottom:15px;
  border-radius:6px;
  border:1px solid var(--border);
  background:#0f172a;
  color:var(--text);
}

.file{
  padding:8px 10px;
  border-radius:6px;
  cursor:pointer;
  font-size:13px;
  margin-bottom:4px;
}

.file:hover{
  background:var(--primary);
}

.main{
  flex:1;
  display:flex;
  flex-direction:column;
}

.toolbar{
  padding:10px 20px;
  border-bottom:1px solid var(--border);
  background:var(--card);
  font-size:14px;
}

.mode-badge{
  padding:6px 10px;
  border-radius:999px;
  font-size:13px;
  color:var(--text);
  background:rgba(99,102,241,0.12);
  border:1px solid rgba(99,102,241,0.18);
}
.mode-badge.mode-run{ background:rgba(34,197,94,0.12); border-color:rgba(34,197,94,0.18); }
.mode-badge.mode-view{ background:rgba(59,130,246,0.12); border-color:rgba(59,130,246,0.18); }
.mode-btn{ padding:6px 10px; margin-left:6px; border-radius:6px; background:transparent; color:var(--text); border:1px solid var(--border); cursor:pointer }
.mode-btn.active{ background:var(--primary); color:#fff; border-color:var(--primary) }
.mode-btn:disabled{ opacity:0.5; cursor:not-allowed }

.viewer{
  flex:1;
}

iframe{
  width:100%;
  height:100%;
  border:none;
  background:white;
}

pre{
  margin:0;
  padding:20px;
  overflow:auto;
  height:100%;
  background:#0b1220;
  color:#38bdf8;
}
</style>
</head>

<body>

<div class="sidebar">
  <h2>📂 PHP Loader</h2>
  <p style="font-size: 12px;">Generate By chat GPT | Idea Aria Fatah</p>
  <p style="font-size: 12px;color:#94a3b8;margin-top:0;">Tip: buat file <b>.ignore</b> di folder root.</p>
  <input id="search" class="search" placeholder="Search...">

  <?php foreach ($files as $f):
      $enc = rawurlencode($f);
      $display = toDisplayPath($f);
  ?>
    <div class="file"
         data-path="<?php echo htmlspecialchars($display) ?>"
         data-enc="<?php echo $enc ?>">
      <?php echo htmlspecialchars($display) ?>
    </div>
  <?php endforeach; ?>
</div>

<div class="main">
  <div class="toolbar">
    <div style="display:flex;align-items:center;gap:12px">
      <span id="currentFile">Select a file...</span>
      <span id="modeBadge" class="mode-badge mode-run">Mode: Run</span>
      <div style="margin-left:auto">
        <button id="runBtn" onclick="runFile()" class="mode-btn active">Run</button>
        <button id="viewBtn" onclick="viewSource()" class="mode-btn">View Source</button>
        <button id="openBtn" onclick="openInNewTab()" class="mode-btn" disabled>Open</button>
      </div>
    </div>
  </div>
  <div class="viewer" id="viewer">
    <div style="padding:20px;color:#94a3b8">
      🚀 Select a file from sidebar
    </div>
  </div>
</div>

<script>
const initialFile = "<?php echo isset($_GET['file']) ? rawurlencode($_GET['file']) : '' ?>";
const initialMode = "<?php echo isset($_GET['mode']) ? $_GET['mode'] : '' ?>";
const initialQuery = "<?php echo isset($_GET['q']) ? rawurlencode($_GET['q']) : '' ?>";
</script>

<script>
let selectedFile = null;
// viewerMode: 'run' === clicking a file runs it, 'view' === clicking shows source
let viewerMode = 'run';

function updateURL(){
  const params = new URLSearchParams();
  const searchEl = document.getElementById('search');
  const q = searchEl ? searchEl.value.trim() : '';

  if (q) {
    params.set('q', q);
  }

  if (selectedFile) {
    // selectedFile is encoded in the DOM; decode once so URLSearchParams encodes correctly.
    params.set('file', decodeURIComponent(selectedFile));
    if (viewerMode) params.set('mode', viewerMode);
  }

  const qs = params.toString();
  history.replaceState(null, '', qs ? ('?' + qs) : location.pathname);
}

function updateOpenButton(){
  const btn = document.getElementById('openBtn');
  if(!btn) return;
  btn.disabled = !selectedFile;
  if(selectedFile){
    btn.title = viewerMode === 'view' ? 'Open source in new tab' : 'Open file in new tab';
  } else {
    btn.title = 'No file selected';
  }
}

document.querySelectorAll('.file').forEach(el=>{
  el.addEventListener('click', ()=>{
    selectedFile = el.dataset.enc;
    document.getElementById('currentFile').innerText = el.dataset.path;
    // Auto-act according to current mode
    if (viewerMode === 'view') viewSource(); else runFile();
    updateOpenButton();
  });
});

function setMode(mode){
  viewerMode = mode === 'view' ? 'view' : 'run';
  const badge = document.getElementById('modeBadge');
  const runBtn = document.getElementById('runBtn');
  const viewBtn = document.getElementById('viewBtn');
  if(badge){
    badge.classList.toggle('mode-view', viewerMode === 'view');
    badge.classList.toggle('mode-run', viewerMode === 'run');
    badge.innerText = 'Mode: ' + (viewerMode === 'view' ? 'View' : 'Run');
  }
  if(runBtn && viewBtn){
    runBtn.classList.toggle('active', viewerMode === 'run');
    viewBtn.classList.toggle('active', viewerMode === 'view');
  }
}

function runFile(){
  if(!selectedFile) return;
  setMode('run');
  document.getElementById('viewer').innerHTML =
    `<iframe src="${decodeURIComponent(selectedFile)}"></iframe>`;
  updateURL();
  updateOpenButton();
}

function viewSource(){
  if(!selectedFile) return;
  setMode('view');

  fetch('?view=' + selectedFile)
    .then(res=>res.text())
    .then(html=>{
      let doc = new DOMParser().parseFromString(html, 'text/html');
      let code = doc.querySelector('pre')?.innerText || 'Error';
      document.getElementById('viewer').innerHTML =
        `<pre>${code.replace(/</g,"&lt;")}</pre>`;
      updateURL();
      updateOpenButton();
    });
}

function openInNewTab(){
  if(!selectedFile) return;
  let url = viewerMode === 'view' ? ('?view=' + selectedFile) : decodeURIComponent(selectedFile);
  window.open(url, '_blank');
}

function applySearchFilter(query){
  const q = query.toLowerCase();
  document.querySelectorAll('.file').forEach(el=>{
    el.style.display = el.dataset.path.toLowerCase().includes(q) ? '' : 'none';
  });
}

// initialize from URL params if present
if (initialFile) {
  selectedFile = initialFile;
  // set the visible filename if the element exists
  const el = document.querySelector('.file[data-enc="' + initialFile + '"]');
  if (el) document.getElementById('currentFile').innerText = el.dataset.path;
  if (initialMode === 'view') viewSource(); else runFile();
  updateOpenButton();
}

const searchInput = document.getElementById('search');
if (searchInput) {
  if (initialQuery) {
    searchInput.value = decodeURIComponent(initialQuery);
    applySearchFilter(searchInput.value);
  }

  searchInput.addEventListener('input', function(){
    applySearchFilter(this.value);
    updateURL();
  });
}
</script>

</body>
</html>
