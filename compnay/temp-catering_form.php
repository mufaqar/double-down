<?php /* Template Name: Catering Form (C)  */ 



get_header();


?> 
 <?php include('navigation.php'); ?>

<div class="custom_container catering_form mt-5 mb-5">
    <div class="_info mt-5 mb-5">
        <h2>Catering Form</h2>
        <p>Here you change your regular lunch delivery from us. If you only want to cancel or change
            the type of lunch on certain days, do so <span>her.</span></p>
    </div>
    <hr>

    <div class="_form mt-5 p-4 pt-5 pb-5">
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Number of People</label>
                    <div class="_select">
                        <select>
                            <option value="">01</option>
                            <option value="">02</option>
                            <option value="">03</option>
                            <option value="">04</option>
                            <option value="">05</option>
                            <option value="">06</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Date</label>
                    <div class="_select">
                        <input type="date" valu="" placeholder="02-05-22">
                    </div>
                </div>


                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Time</label>
                    <div class="_select">
                        <input type="time" valu="" placeholder="02-05-22">
                        <!-- <img src="./reources//images/date.png" alt=""> -->
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Address</label>
                    <div class="_select">
                        <input type="text" valu="" placeholder="Add your address">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Food Type</label>
                    <div class="_select">
                        <select>
                            <option value="">Bread</option>
                            <option value="">Bread</option>
                            <option value="">Bread</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Product Category</label>
                    <div class="_select">
                        <select>
                            <option value="">Accessories</option>
                            <option value="">Accessories</option>
                            <option value="">Accessories</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Product Sub-Category</label>
                    <div class="_select">
                        <select>
                            <option value="">Salad</option>
                            <option value="">Salad</option>
                            <option value="">Salad</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>


                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Budget Per Person</label>
                    <div class="_select">
                        <input type="text" valu="" placeholder="NOK 349">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Allergens</label>
                    <div class="_select">
                        <select>
                            <option value="">Vegetarian</option>
                            <option value="">Vegetarian</option>
                            <option value="">Vegetarian</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Food Categories</label>
                    <div class="_select">
                        <select>
                            <option value="">Salad</option>
                            <option value="">Salad</option>
                            <option value="">Salad</option>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="d-flex justify-content-end savebtn">
                    <a href="" class="btn_primary">Save</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</main>


    <?php get_footer();?>

     <!-- Font Awsome -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





