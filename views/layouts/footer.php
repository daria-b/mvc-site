<div id="footer">

    <div id="footer-menu">
        <a href="/message/">Оставить отзыв</a>
        <div class="top-menu-line"></div>
        <a href="/about/">О нас</a>
        <div class="top-menu-line"></div>
        <a href="/delivery/">Доставка</a>
    </div>

    <div id="copyright">
        &copy; <a href="/">www.technoshop.ua</a>
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

<!-- Модальное окно -->
<script>
    $(document).ready(function() {

        //select all the a tag with name equal to modal
        $('a[name=modal]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            //Get the A tag
            var id = $(this).attr('href');

            //Get the screen height and width
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();

            //Set heigth and width to mask to fill up the whole screen
            $('#mask').css({'width':maskWidth,'height':maskHeight});

            //transition effect
            $('#mask').fadeIn(1000);
            $('#mask').fadeTo("slow",0.8);

            //Get the window height and width
            var winH = $(window).height();
            var winW = $(window).width();

            //Set the popup window to center
            $(id).css('top',  winH/2-$(id).height()/2);
            $(id).css('left', winW/2-$(id).width()/2);

            //transition effect
            $(id).fadeIn(2000);

        });

        //if close button is clicked
        $('.window .close').click(function (e) {
            //Cancel the link behavior
            e.preventDefault();
            $('#mask, .window').hide();
        });

        //if mask is clicked
        $('#mask').click(function () {
            $(this).hide();
            $('.window').hide();
        });

    });
</script>

<!-- Добавление в корзину через ajax -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html("("+data+")");
            });
            return false;
        });
    });
</script>

<!-- Добавление комментраиев -->
<script src="/template/js/jquery-1.5.1.min.js/"></script>
<script type="text/javascript">
    $(function() {
        $("#send").click(function(){
            var author = $("#author").val();
            var message = $("#message").val();
            var date = new Date();
            $.ajax({
                type: "POST",
                url: "/components/Message.php",
                data: {"author": author, "message": message, "date": date},
                cache: false,
                success: function(response){
                    var messageResp = new Array('Ваше сообщение отправлено','Сообщение не отправлено Ошибка базы данных','Нельзя отправлять пустые сообщения','Вы ввели слишком длинное имя или сообщение');
                    var resultStat = messageResp[Number(response)];
                    if(response == 0){
                        $("#author").val("");
                        $("#message").val("");
                        $("#date").val("");
                        $("#commentBlock").prepend("<div class='comment'><strong class='comment-title'>"+author+"</strong> "+"<div class='comment-left'><strong class='comment-title'>"+(date.toString()).substr(0, (date.toString()).length - 40)+"</strong></div><br>"+"<br>"+message+"</div>");
                    }
                    $("#resp").text(resultStat).show().delay(1500).fadeOut(800);
                }
            });
            return false;

        });
    });
</script>

</html>