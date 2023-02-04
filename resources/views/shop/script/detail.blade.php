<script>
    $(document).ready(function(e){
        $(".add-to-cart").click(function(e) {
            const sku = $(this).data("sku");
            const qty = $("#qty").val();
            $.ajax({
                type: "post",
                url: `${base_url}/cart/add-to-cart`,
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
                    $(".alert-success").show();
                },
                success: function(response) {
                    hideLoading();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    hideLoading();
                    alert(errorThrown)
                }
            });
        });
    });
</script>