var defaultvalue = {} ; //�A�z�z��̐錾

//�����l���`
defaultvalue["text_head"] = "���͂��Ă���������";

$(function(){

$(".demo").focus(function() { // ���i���t�H�[�J�X�𓾂��Ƃ�
var idname = $(this).attr("id"); // �t�H�[�J�X���ꂽ���i��ID�𒲂ׂ�
if($(this).val() == defaultvalue[idname]) { // ���g�������l�̏ꍇ
$(this).val(""); // ���g����ɂ���
$(this).css("color","#000000") // �F���u���b�N�ɂ���
}
})

$(".demo").blur(function() {  // ���i���t�H�[�J�X���������Ƃ�
setdefault($(this)) ;
})

$(".demo").show(function() { // ���i���ŏ��ɕ\�����ꂽ�Ƃ�
setdefault($(this)) ;
})

$("#reset1").click(function() { // ���Z�b�g�{�^�����N���b�N���ꂽ�Ƃ�
$(".demo").each(function() {
$(this).val("") ;
setdefault($(this)) ;
})
return false;
})

})

//�F���O���[�ɂ��āA���g�������l�ɂ���֐��F���x���g���̂Ŋ֐��ɂ���
function setdefault(obj){
var idname = obj.attr("id"); // ���i��ID�𒲂ׂ�
if(obj.val() == defaultvalue[idname] || obj.val() == "") { // ���g�������l�A�������͋�̏ꍇ
obj.val(defaultvalue[idname]); // ���g�������l�ɂ���
obj.css("color","#AAAAAA") // �F���O���[�ɂ���
}
}
