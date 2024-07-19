window.onload = function() {
    // 出身校情報の大学を初期表示時点で非表示にする
    $('#daigaku').hide();
    $("#sembatsu_houshiki").val("");
    $('#daiitishibo_gakka').prop('disabled', true);
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    })
}

$(function(){
    $("#address_search").click(function() {
        //var params = {
        //    "zipcode" : $('#zimcode').val()
        //};
        var url = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" + $('#student_post_code1').val() + $('#student_post_code2').val();
        $.getJSON(url,
        function(data){
            for (var i in data.results) {
                console.log("データ内容：" + data.results[i].address1 + data.results[i].address2 + data.results[i].address3); 
                $("#student_address").val(data.results[i].address1 + data.results[i].address2 + data.results[i].address3);
                //$("#honnin_jusho_kana1").val(data.results[i].kana1 + data.results[i].kana2 + data.results[i].kana3);

            }
        });

    });
    $('#sembatsu_houshiki').change(function() {
        $.ajax({
            url:'/get_gakka',
            type:'GET',
            dataType:'json',
            data:{
                'sembatsu_houshiki':$('#sembatsu_houshiki').val()
            }
            
        })
        // Ajax通信が成功したら発動
        .done(function(res) {
            $('#daiitishibo_gakka').html('');
            $('#daiitishibo_gakka').prop('disabled', false);
            var option;
            $.each(res, function (index, value){
                option = '<option value=' + value.gakka_cd + '>' + value.gakka_name + '</option>';
                $('#daiitishibo_gakka').append(option);
            });
        })
        // Ajax通信が失敗したら発動
        .fail( function(jqXHR, textStatus, errorThrown){
            alert('Ajax通信に失敗しました。');
            console.log("jqXHR：" + jqXHR.status); // HTTPステータスを表示
            console.log("textStatus：" + textStatus); // タイムアウト、パースエラーなどのエラー情報を表示
            console.log("errorThrown：" + errorThrown.message); // 例外情報を表示

        });
    });
    $('#koko_code').focusout(function() {

        // 高校コードより所在地を自動設定する
        var code = $('#koko_code').val().substring(0,2);
        console.log(code);
        if(Number(code) <= 47) {
            $("#koko_shozaichi").find("option[value='"+ code + "']").prop('selected', true);
        } else {
            $("#koko_shozaichi").find("option[value='48']").prop('selected', true);
        }
    });

    var minCount = 1;
    var maxCount = 13;
    $('#add_gakureki_shokureki').click(function() {
        minCount++;
        var inputCount = $('#gakureki_shokureki_area .unit').length;
        if (inputCount < maxCount){
            var element = $('#gakureki_shokureki_area .unit:last-child').clone(true);// 末尾をイベントごと複製
            element.eq(0).children('label').text('学歴・職歴' + minCount);
            
            // 複製したinputのクリア
            //var inputList = element[0].querySelectorAll('input[type="text"], textarea');
            //for (var i = 0; i < inputList.length; i++) {
            //inputList[i].value = "";
            //}
            $('#gakureki_shokureki_area .unit').parent().append(element);// 末尾追加
        }
    });
    $('#add_gakureki_shokureki').click(function() {
        minCount++;
        var inputCount = $('#gakureki_shutsuganshikaku_area .unit').length;
        if (inputCount < maxCount){
            var element = $('#gakureki_shutsuganshikaku_area .unit:last-child').clone(true);// 末尾をイベントごと複製
            element.eq(0).children('label').text('学歴・職歴' + minCount);
            
            // 複製したinputのクリア
            //var inputList = element[0].querySelectorAll('input[type="text"], textarea');
            //for (var i = 0; i < inputList.length; i++) {
            //inputList[i].value = "";
            //}
            $('#gakureki_shutsuganshikaku_area .unit').parent().append(element);// 末尾追加
        }
    });
});
