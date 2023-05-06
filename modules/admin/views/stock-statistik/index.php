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
                <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2><?php 
                
                   $a =[];
                        foreach($orderProduct as $product){
                            $a [] = $product->prdtProduct->count; 
                        }
                    echo array_sum($a). ' Products'?></h2>
                    <p class="m-b-0"> Order Today</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i  class="fa fa-calendar-check-o f-s-40 color-warning" aria-hidden="true"></i></span>

                </div>
                <div class="media-body media-text-right">
                    <h2><?php   
                        $c= [];
                        foreach($saleProduct as $product){
                            $c [] = $product->prdtProduct->count; 
                        }
                        echo array_sum($c). ' Products'; 
                        ?></h2>
                    <p class="m-b-0">Sales Today</p>
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
                    <p class="m-b-0">Total sale price</p>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                 <h4>  Products in Stock</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="">
                    <div style="display: flex; justify-content: space-between; margin: 10px;">

                            <select style="border-radius: 10px; padding: 2px;"  name="category" id="">
                                <option value="">All Categores</option>
                                <?php foreach($categores as $categore):?>
                                <option value="<?=$categore->id?>"><?=$categore->name?></option>       
                                <?php endforeach?>
                            </select>
                            <select style="border-radius: 10px; padding: 2px;" name="stock" id="">
                                <option value="">All Stocks</option>
                                <?php foreach($coreStocks as $stock):?>
                                <option value="<?=$stock->id?>"><?=$stock->name?></option>       
                                <?php endforeach?>
                            </select>
                            <select  style="border-radius: 10px; padding: 2px;" name="action" id="">
                                <option value="">Orders or Solds</option>
                                <option value="1">Order</option>
                                <option value="0">Sold</option>
                            </select>
                            <input style="padding: 3px;border-radius: 10px;" type="date" name="from">
                            <input style="padding: 3px; border-radius: 10px;" type="date" name="to">
                            <button   class=" btn btn-info " style="padding: 10px 20px; border-radius: 10px;">Filter</button>
                        </div>
                        </form>
                        <form action="">
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Original Price</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Order</th>
                            <th>Chack</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php foreach($products as $product):?>
                            <tr>
                                <td>
                                    <div class="round-img">
                                        <a href=""><img src="/images/avatar/4.jpg" alt=""></a>
                                    </div>
                                </td>
                                <td><?= $product->name?></td>
                                <td><?= $product->prdtCategory->name?></td>
                                <td><span><?=$product->orginal_price?></span></td>
                                <td><span><?=$product->price?></span></td>
                                <td><span><?=$product->count?></span></td>
                                <td><a href="#"><span class=" p-2 badge badge-success">Order</span></a></td>
                                <td><input type="checkbox" name="<?= $product->id?>" value="<?=$product->id?>"></td>
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