/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    
    function login() {
        console.log("login");
    }
    
    function gmail() {
        console.log("gmail");
    }
    
    function twitter() {
        console.log("twitter");

    }
    
    function facebook() {
        console.log("facebook");
    }

    console.log("Test login.js");
    $('#google').click(gmail);
    $('#facebook').click(facebook);
    $('#twitter').click(twitter);
    $('#login').click(login);

});
