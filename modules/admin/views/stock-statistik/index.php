<!-- Start Page Content -->
<div class="row">
    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2><?php
                    $s=[];
                        foreach($products as $product){
                            $s[] = $product->count; 
                        }
                        echo array_sum($s). ' Total'; ?></h2>
                    <p class="m-b-0">Find Products</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2><?php   
                        $c= [];
                        foreach($products as $product){
                            $c [] = $product->price; 
                        }
                        echo array_sum($c). ' $'; 
                        ?></h2>
                    <p class="m-b-0">Selecting Products</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2><?php 
                
                   $a =[];
                        foreach($orderProduct as $product){
                            $a [] = $product->prdtProduct->count; 
                        }
                    echo array_sum($a). ' Total'?></h2>
                    <p class="m-b-0">Today's orders</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2><?php 
                    $b= [];
                        foreach($saleProduct as $product){
                            $b [] = $product->prdtProduct->price; 
                        }
                    echo array_sum($b). '$'?></h2>
                    <p class="m-b-0">Today's income</p>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                 <h4>  Products Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="">
                    <div style="display: flex; justify-content: space-between; margin: 10px;">

                            <select style="border-radius: 10px; padding: 2px;"  name="category" id="">
                                <option value="">All Categores</option>
                                <?php foreach($categores as $categore):?>
                                <option

                                    <?= !empty($_GET['category'])&&$_GET['category']==$categore->id?'selected':"" ?>

                                value="<?=$categore->id?>"><?=$categore->name?></option>       
                                <?php endforeach?>
                            </select>
                            <select style="border-radius: 10px; padding: 2px;" name="stock" id="">
                                <option value="">All Stocks</option>
                                <?php foreach($coreStocks as $stock):?>
                                <option 

                                     <?= !empty($_GET['stock'])&&$_GET['stock']==$stock->id?'selected':"" ?>

                                 value="<?=$stock->id?>"><?=$stock->name?></option>       
                                <?php endforeach?>
                            </select>
                            <select  style="border-radius: 10px; padding: 2px;" name="action" id="">
                                <option value="">Orders or Solds</option>
                                <option 

                                    <?= !empty($_GET['action'])&&$_GET['action']==2?'selected':"" ?>

                                value="2">Order</option>
                                <option 

                                    <?= !empty($_GET['action'])&&$_GET['action']==1?'selected':"" ?>

                                value="1">Sold</option>
                            </select>
                            <input style="padding: 3px;border-radius: 10px;" type="datetime-local" name="from">
                            <input style="padding: 3px; border-radius: 10px;" type="datetime-local" name="to">
                            <button   class=" btn btn-info " style="padding: 10px 20px; border-radius: 10px;">Filter</button>
                        </div>
                        </form>
                        <form action="edit" >
                        <div >
                            <!-- bunda qaysi biri bosilsa shunga qarab ishlash kk funcsiya yoki ,
                            discountga modal qilish kere . editni forech bn form chiqarib qoyaveramiz  -->
                            <input type="submit" class="m-10 btn btn-warning" name="change" style="padding: 10px 20px;margin: 5px; border-radius: 10px;" value='Discount'>
                            <input  type="submit" class="m-10 btn btn-info" name="change" style="padding: 10px 20px;margin: 5px; border-radius: 10px;" value='Edit'>
                        </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Original Price</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php foreach($products as $product):?>
                            <tr>
                                <td><input type="checkbox" multiple name="ids[]" value="<?=$product->id?>"></td>
                                <td>
                                    <div class="round-img">
                                        <a href=""><img src="/images/avatar/4.jpg" alt=""></a>
                                    </div>
                                </td>
                                <td><?= $product->name?></td>
                                <td><?= $product->discount?></td>
                                <td><?= $product->prdtCategory->name?></td>
                                <td><?= $product->prdtBrand->name?></td>
                                <td><span><?=$product->orginal_price?> $</span></td>
                                <td><span><?=$product->price?> $</span></td>
                                <td><span><?=$product->count?></span></td>
                                <td><a href="#">
                                    <?php if(!empty($_GET['action'])){?>
                                        <span class="badge badge-warning"><?= !empty($_GET['action'])&&$_GET['action']==2?'Order':"Sold" ?> </span>
                                    <?php }else{ ?>
                                        <span class=" p-2 badge badge-success">On Sale</span>
                                    <?php }?>
                                </a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- End PAge Content -->