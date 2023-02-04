<script>
    $(document).ready(function(){
        let timer;

        function callbackChangeQty(sku, qty){
            clearTimeout(timer);
            timer = setTimeout(function() {
                 $.ajax({
                    type: "post",
                    url: `${base_url}/cart/update-cart`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        sku: sku,
                        qty: qty
                    },
                    processData: true,
                    // contentType: false,
                    // dataType: 'JSON',
                    beforeSend: function() {
                        showLoading();
                    },
                    success: function(response) {
                        const data = response.data;
                        $(`td[data-sku=${sku}]`).html(data.subtotal_product);
                        $(".total").html(data.total);
                        hideLoading();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        hideLoading();
                        alert(errorThrown)
                    }
                });
            }, 500);
           
        }
      

        $(".qty-val").change(function(e){
            const qty = $(this).val();
            const sku = $(this).data('sku');
            callbackChangeQty(sku, qty);
        })

        $(".btn-remove").click(function(e){
            const sku = $(this).data('sku');
            $.ajax({
                type: "post",
                url: `${base_url}/cart/remove-cart`,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    sku: sku,
                },
                processData: true,
                // contentType: false,
                // dataType: 'JSON',
                beforeSend: function() {
                    showLoading();
                },
                success: function(response) {
                    const data = response.data;
                    $(`tr[data-sku=${sku}]`).remove();
                    $(".total").html(data.total);
                    hideLoading();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    hideLoading();
                    alert(errorThrown)
                }
            });
        })

        $("#confirm-order").click(function(e){
            $.ajax({
                type: "post",
                url: `${base_url}/cart/place-order`,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                // contentType: false,
                // dataType: 'JSON',
                beforeSend: function() {
                    showLoading();
                },
                success: function(response) {
                    alert('Berhasil');
                    location.href = base_url;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    hideLoading();
                    alert(errorThrown)
                }
            });
        })
    })
</script>