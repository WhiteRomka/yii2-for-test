<?php
?>
<h1>Ajax2</h1>
<div id="js_htmlInner" ></div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $.get(
            '/site/ajax-test-receiver',
            {"id": 1, "obj": JSON.stringify({"a":12, "b":33}), "arr": JSON.stringify(['a', 'b'])},
            function (data) {
                console.log(data);
                $('#js_htmlInner').html(data);
            }
        );
    });
</script>
