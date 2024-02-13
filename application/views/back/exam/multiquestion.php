    <style>

        .remove {
            width: 30px;
            height: 30px;
            font-size: 20px;
            background-color: tomato;
            color: white;
            border: none;
            border-radius: 15px;
        }
        #addRow, #getValues {
            width: 130px;
            height: 40px;
            font-size: 16px;
            background-color: lightseagreen;
            color: white;
            border: none;
            margin: 20px;
        }
        button:hover {
            cursor: pointer;
        }
        tr:hover {
            cursor: move;
        }
    </style>

<script type="text/javascript">
  if(document.getElementById("testName").checked) {
    document.getElementById('testNameHidden').disabled = true;
  }
</script>




<div class="well">
        <table id="example2" class="table table-bordered table-hover">
        <tbody>
            <tr>
                <td>Question</td>
                <td>Answer 1 </td>
                <td>Answer 2 </td>
                <td>Answer 3 </td>
                <td>Answer 4 </td>
                <td></td>
            </tr>
            <form style="text-align: ; border: 1px" method="post" action="<?php echo base_url(); ?>super_admin/add_mulquestion_info" >

            <tr><input type="text" class="form-control" name="xmid" value="1">
                <td><input type="text" class="form-control" name="question"></td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"> 
                            <input type="checkbox" value="1" name="correct[]">
                            <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                        </span>
                        <input class="form-control" name="content[]" placeholder="Answer 1">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"> 
                            <input type="checkbox" value="1" name="correct[]">
                            <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                        </span>
                        <input class="form-control" name="content[]" placeholder="Answer 2">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"> 
                            <input type="checkbox" value="1" name="correct[]">
                            <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                        </span>
                        <input class="form-control" name="content[]" placeholder="Answer 3">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"> 
                            <input type="checkbox" value="1" name="correct[]">
                            <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                        </span>
                        <input class="form-control" name="content[]" placeholder="Answer 4">
                    </div>
                </td>
                
                <td><button class="remove">-</button></td>
            </tr>

            
        </tbody>
    </table>
    <input class="btn btn-info" type="submit"; value="Submit now"> 
</form>
    <button id="addRow">+ Add</button>
    

    <button id="getValues">Get Values</button>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
var html = '<tr><td><input type="text" class="form-control" name="question"></td><td><div class="input-group"> <span class="input-group-addon"> <input type="checkbox" value="1" name="correct[]"> <input id="testNameHidden" type="hidden" value="0" name="correct[]"> </span><input class="form-control" name="content[]" placeholder="Answer 1"> </div></td><td><div class="input-group"><span class="input-group-addon"> <input type="checkbox" value="1" name="correct[]"><input id="testNameHidden" type="hidden" value="0" name="correct[]"></span><input class="form-control" name="content[]" placeholder="Answer 2"></div></td><td><div class="input-group"><span class="input-group-addon"> <input type="checkbox" value="1" name="correct[]"> <input id="testNameHidden" type="hidden" value="0" name="correct[]"></span><input class="form-control" name="content[]" placeholder="Answer 3"></div></td><td><div class="input-group"><span class="input-group-addon"> <input type="checkbox" value="1" name="correct[]"> <input id="testNameHidden" type="hidden" value="0" name="correct[]"></span><input class="form-control" name="content[]" placeholder="Answer 4"> </div> </td> <td><button class="remove">-</button></td></tr>';
$(function() {
    $('tbody').sortable();
 
    $('#addRow').click(function(){
        $('tbody').append(html);
    });
 
    $(document).on('click', '.remove', function() {
        $(this).parents('tr').remove();
    });
 
    $('#getValues').click(function(){
        var values = [];
        $('input[name="question"]').each(function(i, elem){
            values.push($(elem).val());
        });
        alert(values.join(', '));
    });
});
</script>