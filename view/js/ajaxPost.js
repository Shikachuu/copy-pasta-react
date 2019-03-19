function ajaxPost(dataArray, url) {
    console.log(url);
    return $.ajax({
        url: url,
        type: "POST",
        data: dataArray,
        contentType: false,
        cache: false,
        timeout: 15000,
        processData: false,
        success: (data) => {
            return new $.Deferred().resolve().promise();
        },
        error: (data) => {
            return new $.Deferred().resolve().promise();
        }
    });
}