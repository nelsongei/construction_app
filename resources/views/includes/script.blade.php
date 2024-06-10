<script>
    document.getElementById('use_points').addEventListener('click',function (e) {
        if(this.checked)
        {
            console.log('Hello');
            $("#point_input").show();
        }
        else{
            $("#point_input").hide()
        }
    })
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(".buy_now_btn").click(function () {
            var product_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ url('site.single','') }}" + '/' + product_id,
                data: "",
                success: function (response) {
                    $("#buy_now_modal").modal('show')
                    $("#buy_now_modal_heading").html("Product Details");
                    $(".product_name").val(response.name)
                    $(".product_price").val(response.points)
                    $(".product_id").val(response.id)
                },
                error: function (error) {
                    console.log(error);
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function () {
        $(".menu_buy_item").click(function () {
            var product = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/view/product/"+product,
                data: "",
                success: function (response) {
                    $("#buy_now").modal('show')
                    $("#buy_now_menu_modal_heading").html("Product Details");
                    $(".product_name").val(response.name)
                    $(".menu_item_price").val(response.price)
                    $(".menu_item_id").val(response.id)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function () {
        $(".plus").click(function () {
            var qty = Number($("#input-text").val()) + 1
            var total = $(".menu_item_price").val() * qty;
            console.log(total);
            $("#total").val(total);
        })
        $(".minus").click(function () {
            var qty = Number($("#input-text").val()) - 1
            if (qty < 1) {
                qty = 1;
            }
            var total = $(".menu_item_price").val() * qty;
            console.log(total);
            $("#total").val(total);
        })
    })
</script>
<script>
    $("#buy_now_modal").on("hidden.bs.modal", function () {
        $(".qty").val(1);
    });
</script>
<script>
    $(document).ready(function () {
        $("#purchase_now").click(function () {
            var quantity = $(".qty").val();
            var product_name = $(".product_name").val();
            var product_price = $(".product_price").val();
            var product_id = $(".product_id").val();
            $.ajax({
                type: "POST",
                url: "{{ url('product.purchase') }}",
                data: {
                    quantity,
                    product_name,
                    product_price,
                    product_id,
                },
                success: function (response) {
                    $("#buy_now_modal").modal('hide')
                    swal("Success", response, "success");
                },
                error: function (error) {
                    if (error.responseJSON.error) {
                        console.log();
                        swal("", error.responseJSON.error, "error");
                    } else {
                        swal("", "Something went wrong,please try again later", "error");
                    }
                }
            });
        });
    })
</script>
<script>
    $(document).ready(function () {
        $("#purchase_menu_item").click(function () {
            var quantity = $("#input-text").val();
            var menu_item_id = $('.menu_item_id').val();
            var sub_total = $('.menu_item_total').val();
            var price = $('.menu_item_price').val();
            $.ajax({
                type: "POST",
                url: "{{url('site.single.menu.item.add.to.cart')}}",
                data: {
                    quantity,
                    menu_item_id,
                    sub_total,
                    price
                },
                success: function (response) {
                    get_cart_item(response);
                    if(response.status==='success')
                    {
                        $("#buy_now").modal('hide');
                        $("#input-text").val(1);
                        $('.menu_item_total').val("")
                    }
                },
                error: function (error) {
                    if (error.responseJSON.error) {
                        swal("", error.responseJSON.error, "error");
                    } else {
                        swal("", "Something went wrong,please try again later", "error");
                    }
                }
            })
        })

        function get_cart_item(response) {
            let cart_items = '';
            Object.keys(response.carts).forEach(key => {
                const cart = response.carts[key];
                cart_items += `
                    <tr>
                        <th scope="row">${key}</th>
                        <td>${cart.item_name}</td>
                        <td>Ksh.${new Intl.NumberFormat('en-US').format(cart.price)}</td>
                        <td>${cart.total_quantity}</td>
                        <td>Ksh.${new Intl.NumberFormat('en-US').format(cart.total_sub_total)}</td>
                    </tr>
                `;
            });
            $('#cart_item').html(cart_items);
            $("#sub_total").text('Ksh. '+new Intl.NumberFormat('en-US').format(response.total));
            $("#grand_total").text('Ksh. '+new Intl.NumberFormat('en-US').format(response.total));
            $("#checkout").text(new Intl.NumberFormat('en-US').format(response.total));
        }
    })
</script>
<script>
    $("#refer_user").click(function () {
        $("#reference_modal").modal('show');
    })
</script>
<script>
    $('#generated_link_features').hide();

    $("#generate_link").click(function () {

        $.ajax({
            type: "GET",
            url: "{{ url('site.generate.referral-link') }}",
            success: function (response) {
                $('#generated_link_features').show();
                $("#hashed_link").val(response.referred_by);
            },
            error: function (error) {
                console.log(error);
                if (error.responseJSON.error) {
                    console.log();
                    swal("", error.responseJSON.error, "error");
                } else {
                    swal("", "Something went wrong,please try again later", "error");
                }
            }
        });
    })
</script>
<script>
    $('#share_with_mail').hide();
    $("#copy_to_clipboard").click(function () {
        var copyText = document.getElementById("hashed_link");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        $('#share_with_mail').show();
        navigator.clipboard.writeText(copyText.value);
        swal("Good Job", "Link Copied to Clipboard", "info");
    });
</script>
<script>
    $("#share_email").hide();
    $("#share_with_email").click(function () {
        $("#hashed_link_for_mail").val($("#hashed_link").val());
        $("#share_email").show();
    })
</script>
<script>
    $("#send_mail_btn").click(function () {
        var to_mail = $("#email").val();
        var hashed_referral_link = $("#hashed_link_for_mail").val();
        $(this).html('Sending...');
        $(this).attr('disabled', true);
        $.ajax({
            type: "POST",
            url: "{{ url('site.send-mail') }}",
            data: {
                to_mail,
                hashed_referral_link,
            },
            success: function (response) {
                $("#hashed_link").val(response.referred_by);
                swal("Success", response.message, "success");
                $("#send_mail_btn").html('Send Email').attr('disabled', false);
                //$("#send_mail_btn").attr('disabled',false);
            },
            error: function (error) {
                console.log(error);
                if (error.responseJSON.error) {
                    console.log();
                    swal("", error.responseJSON.error, "error");
                } else {
                    swal("", "Something went wrong,please try again later", "error");
                }
                $("#send_mail_btn").html('Send Email').attr('disabled', false);
            }
        });
    })
</script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{ url('site.single.menu.item.get.cart.items') }}",
            success: function (response) {
                if (response.carts.length === 0) {
                    $('#cart_item').html('<tr class="text-center text-success"><td colspan="5">Your cart is empty.</td></tr>');
                    $("#sub_total").text('Ksh. 0');
                    $("#grand_total").text('Ksh. 0');
                    $("#checkout").text('0');
                } else {
                    let cart_items = '';
                    Object.keys(response.carts).forEach(key => {
                        const cart = response.carts[key];
                        cart_items += `
                            <tr>
                                <th scope="row">${key}</th>
                                <td>${cart.item_name}</td>
                                <td>Ksh.${new Intl.NumberFormat('en-US').format(cart.price)}</td>
                                <td>${cart.total_quantity}</td>
                                <td>Ksh.${new Intl.NumberFormat('en-US').format(cart.total_sub_total)}</td>
                            </tr>`;
                    });
                    $('#cart_item').html(cart_items);
                    $("#sub_total").text('Ksh. ' + new Intl.NumberFormat('en-US').format(response.total));
                    $("#grand_total").text('Ksh. ' + new Intl.NumberFormat('en-US').format(response.total));
                    $("#checkout").text(new Intl.NumberFormat('en-US').format(response.total));
                }
            },
            error: function (error) {
                console.error('Error fetching cart items:', error);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".checkout-btn").click(function () {
            $("#checkout-modal").modal('show');
            $.ajax({
                type: "GET",
                url: "{{ url('site.single.menu.item.get.cart.items') }}",
                success: function (response) {
                    if (response.carts.length === 0) {
                        $('.cart_item').html('<tr class="text-center text-success"><td colspan="5">Your cart is empty.</td></tr>');
                        $(".sub_total").text('Ksh. 0');
                        $(".grand_total").text('Ksh. 0');
                    } else {
                        let cart_items = '';
                        Object.keys(response.carts).forEach(key => {
                            const cart = response.carts[key];
                            cart_items += `
                            <tr>
                                <th scope="row">
                                        <input type="hidden" name="menu_item_id[]" value="${cart.menu_item_id}">
                                        <input type="hidden" name="cart_id[]" value="${cart.cart_id}">
                                      ${key}
                                </th>
                                <td>${cart.item_name}</td>
                                <td><input type="hidden" name="price[]" value="${cart.price}">Ksh. ${new Intl.NumberFormat('en-US').format(cart.price)}</td>
                                <td><input type="hidden" name="quantity[]" value="${cart.total_quantity}">${cart.total_quantity}</td>
                                <td><input type="hidden" name="sub_total[]" value="${cart.total_sub_total}">Ksh. ${new Intl.NumberFormat('en-US').format(cart.total_sub_total)}</td>
                            </tr>`;
                        });
                        $('.cart_item').html(cart_items);
                        $(".sub_total").text('Ksh. ' + new Intl.NumberFormat('en-US').format(response.total));
                        $(".grand_total").text('Ksh. ' + new Intl.NumberFormat('en-US').format(response.total));
                        $(".final_total").val(response.total);
                        $(".total_quantity").val(response.total_quantity);
                    }
                },
                error: function (error) {
                    console.error('Error fetching cart items:', error);
                }
            });
        })
    })
</script>
