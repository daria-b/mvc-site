<div id="footer">

    <div id="copyright">
        &copy; <a href="#">www.technoshop.ua</a>
    </div>

</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    });
</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/php/site/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html("("+data+")");
            });
            return false;
        });
    });
</script>

</html>