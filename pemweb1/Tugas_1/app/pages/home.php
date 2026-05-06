<div class="card mb-3 shadow">
    <div class="row g-0">
        <!-- IMAGE -->
        <!-- <div class="col-md-4 d-flex align-items-center justify-content-center p-4">
            <img src="assets/img/profile.png"
                class="img-fluid rounded-start"
                style="height: 300px; object-fit: cover;" alt="Profile">
        </div> -->

        <!-- FLIP CARD -->
        <div class="col-md-4 d-flex align-items-center justify-content-center p-4">
            <?php
                $frontImage = "assets/img/profile2.png";
                $backImage  = "assets/img/profile.png";
                include 'app/layouts/components/flip-card.php';
            ?>
        </div>

        <!-- CONTENT -->
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title">
                    Hi, I'm Aria Fatah 👋
                </h2>

                <p class="card-text">
                    I am an IT Enthusiast with a strong interest
                    in Cyber Security and Networking.
                </p>

                <p class="card-text">
                    Currently, I am studying at
                    STT Terpadu Nurul Fikri while actively
                    learning Web Development and DevOps.
                </p>

                <p class="card-text">
                    My journey in technology started in 2023
                    through Front-End Development, which later
                    led me to explore system security,
                    networking, and infrastructure.
                </p>

                <p class="card-text">
                    I believe technology is not just about code,
                    but about building secure, reliable,
                    and impactful digital solutions.
                </p>

                <a href="index.php?page=contact"
                   class="btn btn-primary">
                    Contact Me
                </a>

            </div>
        </div>
    </div>
</div>
