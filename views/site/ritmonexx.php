<?php
?>
<div class="container">

    <a id="add-box" class="btn bnt-sm btn-success" href="#" style="margin: 10px;">Add box</a>

    <form action="send" id="myFrom" method="POST">
        <div class="boxes">

            <div class="box" id="box-1">
                <input placeholder="x" type="text" name="x" id="">
                <input placeholder="y" type="text" name="y" id="">
                <input placeholder="z" type="text" name="z" id="">
                <input placeholder="weight" type="text" name="weight" id="">
          <!-- <a class="btn btn-xs btn-danger del" id="1" href="#">delete</a>-->
            </div>

        </div>

        <button id="send">send</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            /** Add new box */
            $('#add-box').on('click', function() {
                let newHtmlBox = '<div class="box" id="box-1">' +
                    '<input placeholder="x" type="text" name="x" id=""> ' +
                    '<input placeholder="y" type="text" name="y" id=""> ' +
                    '<input placeholder="z" type="text" name="z" id=""> ' +
                    '<input placeholder="weight" type="text" name="weight" id=""> ' +
                    '<a class="btn btn-xs btn-danger del" href="#">delete</a> ' +
                    '</div>'
                $('.boxes').append(newHtmlBox)
            })

            /** Delete box */
            $('.boxes').on('click', '.del', function(e) {
               console.log($(e.target).parent().remove())
            })

            /** Send */
            $('#send').on('click', function(e) {
                e.preventDefault()
                let dataForm = $('form#myFrom').serializeArray()

                console.log(dataForm)

                let boxes = [];
                let box;
                for (i = 0; i < dataForm.length; i++) {
                    console.log(dataForm[i]['name'])
                    if (dataForm[i]['name'] == 'x') {
                        box = []
                        box['x'] = dataForm[i]['value']
                        continue
                    }
                    box[dataForm[i]['name']] = dataForm[i]['value']
                    if (dataForm[i]['name'] == 'weight') {
                        boxes.push(box)
                    }

                }
               // console.log(dataForm)
                 console.log(boxes)
            })
        })
    </script>
</div>
