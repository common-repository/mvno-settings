function sanitizeMvnoInput(string) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#x27;',
        "/": '&#x2F;',
    };
    const reg = /[&<>"'/]/ig;
    return string.replace(reg, (match)=>(map[match]));
}

jQuery( document ).ready( function ($) {
    // $.ajax({
    //    type: "post",
    //    url: mvnoAjax.mvnoajaxurl,
    //    data: {
    //        action: "get_mvno_info",
    //    }, success: function (result) {
    //         let d = JSON.parse(result);
    //
    //         $("input[name=mvno_no]").val(d.mvno_number)
    //         $("input[name=auth_code]").val(d.auth_code)
    //     }, error: function (err) {
    //         console.log(err)
    //     }
    // });
    $("#submit").on('click', function (e) {
        e.preventDefault();

        let mvno = $("input[name=mvno_no]").val();
        let auth_code = $("input[name=auth_code]").val();
        let nonce = jQuery("#mvno-settings-save-nounce").val();
        if(mvno == ""){
            alert("MVNO number is required")
            return false;
        }

        if(auth_code == ""){
            alert("Auth Code is required")
            return false;
        }
        $("#loader").show();
        $.ajax({
            type: "post",
            url: mvnoAjax.mvnoajaxurl,
            data: {
                action: "store_mvno_settings",
                mvno: sanitizeMvnoInput(mvno),
                auth_code: sanitizeMvnoInput(auth_code),
                nonce: nonce
            }, success: function (result) {
                if(result != 0){
                    $("#mvno_settings_msg").text("Auth information has been added.");
                }else{
                    $("#mvno_settings_msg").text("Unable to update the auth information.");
                }
                $("#loader").hide();
            }, error: function (err) {
                $("#loader").hide();
            }
        })
    })
} )