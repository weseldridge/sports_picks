</div>
</div>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.clickable tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
</script>


</body>
</html>