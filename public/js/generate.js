function generatePrefix(){
    let characters = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz0123456789";
    let lenString = 7;
    let randomString = "";

    for (let i = 0; i < lenString; i++){
        let rnum = Math.floor(Math.random() * characters.length);
        randomString += characters.substring(rnum, rnum + 1);
    }

    document.getElementById("prefix").value = randomString;
    // console.log(randomString);
}