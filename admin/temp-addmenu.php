<?php /* Template Name: Admin-AddMenu  */

get_header('admin');


?>
<?php include('navigation.php'); ?>
<h2 class="text-center mt-5 mb-5">Add New Product</h2>
<div class="add_menu container mx-auto">

    <form>
        <div class="upload_file">
            <div class="upload_icon"><i class="fa-solid fa-camera"></i></div>
            <input type="file" name="" id="">
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Food Name</label>
            <input type="text" class="form-control admin_input" id="exampleFormControlInput1" placeholder="Bread Lunch">
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Product Category</label>
            <div class="_ad_sel_wrapper">
                <div class="admin_arrow_down "><i class="fa-solid fa-angle-down"></i></div>
                <div>
                    <select class="form-select admin_inputselect" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">Contains</label>
            <div class="_ad_sel_wrapper">

                <div class="admin_arrow_down plus"><i class="fa-solid fa-plus"></i></div>
                <div>
                    <select class="form-select admin_inputselect" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="_options">
                    <div>
                        <span>Sesame Seeds</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Celery</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Gluten</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div>
                        <span>Gluten</span>
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 mt-3">
            <label class="form-label admin_label">NOK</label>
            <input type="text" class="form-control admin_input" id="exampleFormControlInput1" placeholder="100 KR">
        </div>

        <div class="adminbtn_div">
            <button class="admin_save_btn" type="submit">Save</button>
        </div>
    </form>
</div>



</div>
</div>
</div>
</div>

</main>



<script>

</script>

<?php get_footer('admin') ?>