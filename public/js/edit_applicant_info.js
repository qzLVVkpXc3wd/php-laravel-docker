window.onload = function() {
    $('#error-message').hide();
}
$(function(){
    $('#update').click(function () {
        let gakubu_shiboriyu = {};
        let daigakuin_shiboriyu = {};
        let param = {};
        // 学部の志望理由をパラメータに入れる
        $("[name='gakubu_shiboriyu[]'").each(function(i,elem) {
            let key = elem.id;
            gakubu_shiboriyu[key] = elem.value;
        });
        param['gakubu_shiboriyu'] = gakubu_shiboriyu;
        // 大学院の志望理由をパラメータに入れる
        $("[name='daigakuin_shiboriyu[]'").each(function(i,elem) {
            let key = elem.id;
            daigakuin_shiboriyu[key] = elem.value;
        });
        param['daigakuin_shiboriyu'] = daigakuin_shiboriyu;
        // 活動報告をパラメータに入れる
        param['katsudo_hokoku_1_1'] = $('#katsudo_hokoku_1_1').val();
        param['katsudo_hokoku_1_2'] = $('#katsudo_hokoku_1_2').val();
        param['katsudo_hokoku_1_3'] = $('#katsudo_hokoku_1_3').val();
        param['katsudo_hokoku_1_4'] = $('#katsudo_hokoku_1_4').val();
        param['katsudo_hokoku_2'] = $('#katsudo_hokoku_2').val();
        
        $.ajax({
            //POST通信
            type: "post",
            //ここでデータの送信先URLを指定します。
            url: "/updateApplicantInfo",
            data: param
        })
        .done(function(data) {
            // 成功したときの処理
            $('#success-message').toggle();
            console.log(data);

            // 一旦
            alert("正常に更新されました");

        }).fail(function(data){
            // 失敗したときの処理
            $('#error-message').toggle();
            console.log(data);
        });
    });
    
});
