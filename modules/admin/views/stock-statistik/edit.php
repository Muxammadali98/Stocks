<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    

    <?php if(!empty($categores)){ ?>
        <form action="/admin/prdt-product/change">
        <h1>Discount Price Products</h1>
                <select style="padding: 5px 10px ; border-radius: 10px; margin:10px" name="category_id" class="form-select" aria-label="Default select example">
                    <?php foreach($categores as $category):?>
                        <option value="<?=$category->id?>" ><?=$category->name?></option>
                    <?php endforeach ?>
                </select>
                <input style="padding: 5px 10px ; border-radius: 10px; margin:10px" type="number"  name="discount">
             <br>
            <button  class="btn btn-success">Update</button>
        </form>

      <?php } else{ ?>
        <h1>Edit Price Products</h1>
        <form action="/admin/prdt-product/change">
            <?php foreach($products as $product):?>
                <div class="form-group row">
                <label for="<?=$product->name?>" class="col-sm-2 col-form-label col-form-label-lg"><?=$product->name?></label>
                <div class="col-sm-10">
                <input type="number" class="form-control form-control-lg" id="<?=$product->name?>" name="<?=$product->id?>" value="<?=$product->price?>">
                </div>
                <input type="hidden"  multiple name="ids[]" value="<?=$product->id?>" >
            </div>
            <?php endforeach ?>
            <button  class="btn btn-success">Update</button>
        </form>
    <?php } ?>

</body>
</html>