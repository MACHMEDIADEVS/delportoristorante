<?php

/**
 * Template part for the Hours of Operation section on the homepage.
 *
 * @package Del_Porto_Ristorante
 */
?>

<style>
    /*
 * # HOURS OF OPERATION SECTION #
 * ----------------------------------------------------
 */
    .hours-of-operation-section {
        .hours-list {
            .hours-item {

                &:last-child {
                    border-bottom: none;
                }

                .day {
                    font-weight: 500;
                }
            }
        }

        .hours-item {
            background-color: var(--bg-dark);
            color: var(--txt-light);
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    }
</style>

<section class="hours-of-operation-section py-5 bg-dark animate__animated animate__fadeInUp">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col">
                <h2 class="mb-4 text-light animate__animated animate__fadeInUp">HOURS OF OPERATION</h2>
                <p class="text-light animate__animated animate__fadeInUp animate__delay-0-3s">
                    We are open 7 days a week. For holiday hours, please call the restaurant as they may vary.
                </p>

                <div class="hours-list animate__animated animate__fadeInUp animate__delay-0-5s row gap-2 justify-content-center px-3">
                    <div class="hours-item d-flex justify-content-between align-items-center p-2 card review-card review-card col-lg-3">
                        <span class="day text-white fw-bold">MONDAY - THURSDAY</span>
                        <span class="time text-white">11:30 AM - 10:00 PM</span>
                    </div>
                    <div class="hours-item d-flex justify-content-between align-items-center p-2 card review-card review-card col-lg-3">
                        <span class="day text-white fw-bold">FRIDAY & SATURDAY</span>
                        <span class="time text-white">11:30 AM - 11:00 PM</span>
                    </div>
                    <div class="hours-item d-flex justify-content-between align-items-center p-2 card review-card review-card col-lg-3">
                        <span class="day text-white fw-bold">SUNDAY</span>
                        <span class="time text-white">11:30 AM - 10:00 PM</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>