var pcontent = $("#pcontent");
pcontent.on("keyup",function(){
    var text = pcontent.val(),
    // look for any "\n" occurences
    matches = text.match(/\n/g),
    breaks = matches ? matches.length : 2;
    pcontent.attr('rows',breaks + 2);
})
function copyToClipboard(unit) {
    var copyText = document.getElementById(unit).textContent;
    const textArea = document.createElement('textarea');
    textArea.textContent = copyText;
    document.body.append(textArea);
    textArea.select();
    document.execCommand("copy");
    textArea.parentNode.removeChild(textArea);
}