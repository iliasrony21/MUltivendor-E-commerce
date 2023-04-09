<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <title>Api testing</title>
</head>
<body class="p-5">
      <button class="btn btn-info">check</button>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="token">Token</label>
            <input id="token" name="token" type="text" class="form-control" placeholder="Insert your token">
        </div>

        <div class="form-group">
            <label for="product">Product</label>
            <input id="product" name="product" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <input id="des" name="des" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" name="price" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input id="rating" name="rating" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input id="image" name="image" type="text" class="form-control">
        </div>
        <div class="form-group">
            <input type="button" value="save" class="btn btn-info px-5 my-5 save">
        </div>

   <table class="table">
    <thead>
        <tr>
            <th>
                <td>ID</td>
                <td>title</td>
                <td>description</td>
                <td>price</td>
                <td>discountPercentage</td>
                <td>rating</td>
                <td>Image</td>
            </th>
        </tr>
    </thead>
    <tbody class="alldata">


    </tbody>
   </table>





<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function(){

        jQuery(document).on("click",".save",function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

            var title = $("#product").val();
            var des = $("#des").val();
            var price = $("#price").val();
            var rating = $("#rating").val();
            var image = $("#image").val();
            var email = $("#email").val();
            var token = $("#token").val();

            jQuery.ajax({
                url:"/apitest/insert",
                type:"POST",
                data:{
                    "title":title,
                    "des":des,
                    "price":price,
                    "rating":rating,
                    "image":image,
                    "email":email,
                    "token":token,
                },
                success:function(res){
                    alert(res.msg);
                }

            })



        })
        // jQuery("button").click(function(){
        //    jQuery.ajax({
        //     url:"https://dummyjson.com/products/1",
        //     type:"GET",
        //     success:function(res){

        //         $("#product").val(res.title);
        //         $("#des").val(res.description);
        //         $("#price").val(res.price);
        //         $("#rating").val(res.rating);
        //         $("#image").val(res.thumbnail);


        //         // var alldata = '';
        //         // $.each(res.products, function(key, data){
        //         //    alldata +='<tr>\
        //         //         <td>'+key+'</td>\
        //         //         <td>'+data.title+'</td>\
        //         //         <td>'+data.description+'</td>\
        //         //         <td>'+data.price+'</td>\
        //         //         <td>'+data.discountPercentage+'</td>\
        //         //         <td>'+data.rating+'</td>\
        //         //         <td> <img height="100" width="100" src="'+data.thumbnail+'" alt=""></td>\
        //         //     </tr>';

        //         // });
        //         // jQuery('.alldata').html(alldata);

        //     }
        //    })
        // })
    })
</script>
</body>
</html>
