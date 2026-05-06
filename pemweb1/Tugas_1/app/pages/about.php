<div class="card mb-3 shadow">
    <div class="row g-0">

        <!-- FLIP CARD -->
        <div class="col-md-4 d-flex align-items-center justify-content-center p-4">
            <?php
                $frontImage = "assets/img/profile.png";
                $backImage  = "assets/img/profile2.png";
                include 'app/layouts/components/flip-card.php';
            ?>
        </div>

        <!-- CONTENT -->
        <div class="col-md-8 d-flex align-items-center">
            <div class="card-body w-100">

                <h2 class="mb-4">
                    About Me
                </h2>

                <div class="accordion" id="accordionExample">

                    <!-- FAVORITE FOOD -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                🍕 Favorite Food
                            </button>
                        </h2>

                        <div id="collapseOne"
                            class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pizza is one of my favorite foods,
                                especially while coding or
                                studying late at night 😄
                            </div>
                        </div>
                    </div>

                    <!-- ORGANIZATION -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                👥 Organization Experience
                            </button>
                        </h2>

                        <div id="collapseTwo"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                I was active in the IT Club at
                                SMK Harapan Bangsa and currently
                                serve as Executive Committee
                                in the Research & Education Division
                                at NFCC
                                (Nurul Fikri Cyber Security Community).
                            </div>
                        </div>
                    </div>

                    <!-- CAREER -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                🚀 Career Goals
                            </button>
                        </h2>

                        <div id="collapseThree"
                            class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                My goal is to grow as a
                                Cyber Security Engineer
                                while continuously learning
                                about networking,
                                infrastructure,
                                DevOps,
                                and modern technologies.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
