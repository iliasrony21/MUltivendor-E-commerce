jQuery(document).ready(function(){
    jQuery(document).on("click", '.qview_btn',function(){
        var id = jQuery(this).val();
        jQuery.ajax({
            url:"/addtocart/"+id,
            type: "GET",
            success:function(res){
                show();
                alert(res.msg);

            }
        });
    });
        show();
        function show(){
            jQuery.ajax({

                url:"/addtocartshow/",
                type:"GET",
                success:function(res){

                    let allData = "";
                    let sum =0;
                    let count = 0;
                    $.each(res.data,function(key,val){
                        sum+=val.price;
                        count++;
                       allData+= '<li>\
                        <div class="shopping-cart-img">\
                            <a href="shop-product-right.html"><img alt="Nest" src="http://127.0.0.1:8000/uploads/product/'+ val.image+'" /></a>\
                        </div>\
                        <div class="shopping-cart-title">\
                            <h4><a href="shop-product-right.html">'+val.product_name+'</a></h4>\
                            <h4><span>'+val.qnt+' × </span>$ '+val.price+'</h4>\
                        </div>\
                        <div class="shopping-cart-delete">\
                            <button value="'+val.id+'" class="removeitem" ><i class="fi-rs-cross-small  "></i></button>\
                        </div>\
                    </li>'
                    });
                    jQuery(".cartinfo").html(allData);
                    jQuery(".totalAmount").html(sum);
                    jQuery(".totalCount").html(count);
                }

            });
        }
        jQuery(document).on("click", ".removeitem", function(){
            var id = jQuery(this).val();
            jQuery.ajax({
                url:"/removeitem/"+id,
                type:"GET",
                success:function(res){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'successfully deleted',
                        showConfirmButton: false,
                        timer: 1500
                      });
                      show();

                }
            })
        })



});
