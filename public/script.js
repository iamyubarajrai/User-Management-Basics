//alert("Hello jQuery!");
/**
 * jQuery uses CSS selectors
 */
let uname = jQuery('#email'),
    pwd = $("#pwd"),
    btnSubmit = jQuery("[name='submit']");

btnSubmit.on('click', function(e){
    if(uname.val() == '') {
        e.preventDefault();
        uname.next().text("Username is empty.");
    }
    if(pwd.val() == '') {
        e.preventDefault();
        pwd.next().text("Password is empty.");
    }
    // console.log(uname.next(), pwd.next());
});
