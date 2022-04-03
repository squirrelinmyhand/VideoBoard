
$( document ).ready(function() {
    $('#submitForm').click(function(e) {
        const title = $("#title").val();
        const content = quill.root.innerHTML;

        if(!ChkEmpty(title, "제목")) {
            if(!ChkEmpty(content, "본문")) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'post',
                    url : $('#BoardForm').attr('action'),
                    dataType:'json',
                    data: {'title':title, 'content':content},
                    success: function(data) {
                        // console.log(data);
                        $.each( data, function( key, val ) {
                            if(key == "action") {
                                if(val == "insert") {
                                    alert("등록되었습니다.");
                                } else {
                                    alert("수정되었습니다.");
                                }
                            } else if(key == "bid") {
                                location.href='/detail/' + val;
                            }
                            
                        });
                    },
                    error:function() {
                        alert('실패');
                    }
                });
            }
        }
        e.preventDefault();
    });

    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: '본문을 입력해주세요',
        modules: {
            'toolbar': [
                [{ 'size': [] }],
                [ 'bold', 'italic', 'underline', 'strike' ],
                [{ 'color': [] }, { 'background': [] }],
                // [{ 'script': 'super' }, { 'script': 'sub' }],
                [ 'blockquote', 'code-block' ],
                [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'align': [] }],
                [ 'link', 'image', 'video'],
            ],
        },
    });
});

function ChkEmpty(value, type) {
    let isEmpty = false;
    if(value == "") {
        alert(type + "을 입력해주세요.");
        isEmpty = true;
    }
    return isEmpty;
}