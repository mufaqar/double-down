<?php /* Template Name: Order (A)  */ 



get_header('admin');


?>  
<?php include('navigation.php'); ?>
<div class="custom_container c2 ">
    <div class="row ">
        <div class="catering_wrapper mt-5 mb-5 col-md-8">
            <div class="catering_menu buttons">
                <a id="1" class="showSingle _active" target="1">All Orders</a>
                <a id="2" class="showSingle" target="2">Complete</a>
                <a id="3" class="showSingle" target="3">Pending</a>
                <a id="4" class="showSingle" target="4">Cancle</a>
            </div>
        </div>
    </div>
</div>

<section id="div1" class="targetDiv activediv tablediv">
    <table id="all" class="table table-striped orders_table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>#78522135</td>
                <td>Food 1</td>
                <td>351 Shearwood Forest Drive</td>
                <td>2011-04-25</td>
                <td>376.00 Kr</td>
                <td> <span class="status">complete</span> </td>
            </tr>
            <tr>
                <td>2</td>
                <td>#7852335</td>
                <td>Food 2</td>
                <td>351 Shear Forest Drive</td>
                <td>2011-04-25</td>
                <td>476.00 Kr</td>
                <td> <span class="status">pending</span> </td>
            </tr>
            <tr>
                <td>3</td>
                <td>#5432135</td>
                <td>Food 3</td>
                <td>351 Shearwood Forest Drive</td>
                <td>2011-04-25</td>
                <td>36.00 Kr</td>
                <td> <span class="status">complete</span></td>
            </tr>
        </tbody>

    </table>
    
</section>

<section id="div2" class="targetDiv activediv tablediv">
    complete
</section>

<section id="div3" class="targetDiv activediv tablediv">
   pending
</section>

<section id="div4" class="targetDiv activediv tablediv">
    cancle
</section>

</div>
</div>
</div>
</div>

</main>

<?php get_footer('admin') ?>




