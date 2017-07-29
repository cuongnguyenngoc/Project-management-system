function validate(id) {
    $().ready(function () {
        
        $(id).validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                address: {
                    required: true,
                    minlength: 5
                },
                date: "required",
                phone: {
                    required: true,
                    minlength: 10
                },
                description: {
                    required: true,
                    minlength: 30
                }
            },
            messages: {
                name: {
                    required: "Trường tên không được trống",
                    minlength: "Tên phải chứa ít nhất 5 ký tự"
                },
                password: {
                    required: "Trường password không được trống",
                    minlength: "Password cần ít nhất 5 ký tự"
                },
                address: {
                    required: "Trường địa chỉ không được trống",
                    minlength: "Địa chỉ cần ít nhất 5 ký tự"
                },
                email: "Hãy nhập một email hợp lệ",
                agree: "Chấp nhận điều khoản",
                date: "Hãy Chọn ngày sinh cho sinh viên",
                phone: {
                    required: "Hãy nhập số điện thoại hợp lệ",
                    minlength: "Số điện thoại cần ít nhất 8 số"
                },
                description: {
                    required: "Trường mô tả không được trống",
                    minlength: "Cần ít nhất 30 ký tự"
                }
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function () {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function () {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });
}
//function validateSelect(id) {
//    $(document).ready(function () {
//        $(id).validate();
//    });
//}


