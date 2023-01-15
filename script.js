function goToSignIn() {
    window.location = "signIn.php";
}

function goToSignUp() {
    window.location = "signUp.php";
}

var bm;

function signUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var rpassword = document.getElementById("rpassword");
    var mob = document.getElementById("dob");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rpassword", rpassword.value);
    form.append("dob", mob.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                swal({
                    title: "Welcome to Access Compputers",
                    icon: "success",
                    button: "Ok",
                });
                code();
                var m = document.getElementById("code");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                swal({
                    title: "Registration Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "signUpProcess.php", true);
    r.send(form);

}

function code() {

    var email = document.getElementById("email");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                swal({
                    title: "Email Verification Sent",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: "Email Verification Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("GET", "code.php?email=" + email.value, true);
    r.send();

}

function VC() {

    var email = document.getElementById("email");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("email", email.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text = "Success") {
                alert("Email Verified");
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("dob").value = "";
                window.location = "signIn.php";
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("dob").value = "";
                window.location = "signIn.php";
            }
        }
    };
    r.open("POST", "codeProcess.php", true);
    r.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "index.php";
            } else {
                swal({
                    title: "Sign In Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(form);

}

// function homeActive() {

//     document.getElementById("iat1").style.color = "skyblue;";

// }

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "index.php";
            }
        }
    };

    r.open("POST", "signOutProcess.php", true);
    r.send();

}

var fpm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                var m = document.getElementById("ForgotPasswordModal");
                fpm = new bootstrap.Modal(m);
                fpm.show();
            } else {
                swal({
                    title: "Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function resetPassword() {

    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("fvc");

    var form = new FormData();
    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Password Reset Success");
                fpm.hide();
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "resetPassword.php", true);
    r.send(form);

}

function showPassword1() {
    var np = document.getElementById("np");
    var npd = document.getElementById("npd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function showPassword2() {
    var np = document.getElementById("rnp");
    var npd = document.getElementById("rnpd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function changeImg() {

    var image = document.getElementById("img");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }

}

function addProduct() {

    var brand = document.getElementById("brand");
    var title = document.getElementById("title");

    var condition = document.getElementById("condition");

    var colour = document.getElementById("colour");

    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var dwk = document.getElementById("dwk");
    var dok = document.getElementById("dok");
    var description = document.getElementById("description");
    var img = document.getElementById("img");

    //alert(category.value);
    // alert(brand.value);
    //alert(title.value);
    //alert(condition);
    // alert(colour);
    // alert(price.value);
    // alert(qty.value);
    // alert(dwk.value);
    // alert(dok.value);
    // alert(description.value);

    var form = new FormData();
    form.append("brand", brand.value);
    form.append("title", title.value);
    form.append("condition", condition.value);
    form.append("colour", colour.value);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("dwk", dwk.value);
    form.append("dok", dok.value);
    form.append("description", description.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            // alert(Response);
            if (Response == "Success") {
                //alert("Product Added Successfully!!!");
                swal({
                    title: "Product Addded Successfully.",
                    icon: "success",
                    button: "ok"
                });

            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "ok",
                });
            }
        }
    };

    Request.open("POST", "addProductProcess.php", true);
    Request.send(form);

}

//View Product

function goToViewProduct(id) {

    window.location = "viewProduct.php?id=" + id;

}

//All Product

function goToAllProduct(id) {

    window.location = "allProductView.php?id=" + id;

}

// AddToWatchlist

function AddToWatchlist(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Watchlist.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddToWatchListProcess.php?id=" + id, true);
    Request.send();

}

// RemoveFromWatchlist

function RemoveFromWatchlist(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Watchlist.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "RemoveFromWatchListProcess.php?id=" + id, true);
    Request.send();

}

// AddToCart

function AddToCart(id) {

    var qty = document.getElementById("qty");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Cart.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddToCartProcess.php?id=" + id + "&qty=" + qty.value, true);
    Request.send();

}

// RemoveFromCart

function removeFromCart(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Cart.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "RemoveFromCartProcess.php?id=" + id, true);
    Request.send();

}

// UploadImage

function UploadImage() {
    var image = document.getElementById("profile");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

//Admin verification

function adminVerification() {

    var email = document.getElementById("e");

    var form = new FormData();
    form.append("e", email.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {

                sendAdminVCode(email.value);

                var verificationModal = document.getElementById("verificationModal");

                k = new bootstrap.Modal(verificationModal);
                k.show();

            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    r.open("POST", "adminVerificationProcess.php", true);
    r.send(form);

}

//Send admin verification code

function sendAdminVCode(email) {

    var form = new FormData();
    form.append("e", email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                swal({
                    title: "Verification Code Sent. Please check your E-mail",
                    icon: "success",
                    button: "ok",
                });
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "ok",
                });
            }
        }
    };

    r.open("POST", "adminSendVCodeProcess.php", true);
    r.send(form);

}

//Admin verify

function adminVerify() {

    var email = document.getElementById("e");
    var verify = document.getElementById("v");

    var form = new FormData();
    form.append("e", email.value);
    form.append("v", verify.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                k.hide();
                window.location = "adminHome.php";
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "ok",
                });
            }
        }
    };

    r.open("POST", "adminVerifyProcess.php", true);
    r.send(form);

}

//Kadmin search users

function searchUsers() {

    var ksearchtxt = document.getElementById("search");

    var kr = new XMLHttpRequest();

    kr.onreadystatechange = function() {
        if (kr.readyState == 4) {
            var ktext = kr.responseText;
            document.getElementById("users").innerHTML = ktext;
        }
    };

    kr.open("GET", "loadUsers.php?search=" + ksearchtxt.value, true);
    kr.send();

}

//Kblock user

function userStatus(kemail) {

    var kmail = kemail;

    var kblockbtn = document.getElementById("userStatus" + kmail);

    var kf = new FormData();
    kf.append("ke", kmail);

    var kr = new XMLHttpRequest();

    kr.onreadystatechange = function() {
        if (kr.readyState == 4) {
            var kt = kr.responseText;
            if (kt == "Success1") {
                //window.location = "manageUsers.php";
                kblockbtn.className = "btn btn-success";
                kblockbtn.innerHTML = "Unblock";
            } else if (kt == "Success2") {
                kblockbtn.className = "btn btn-danger";
                kblockbtn.innerHTML = "Block";
            }
        }
    };

    kr.open("POST", "userBlockProcess.php", true);
    kr.send(kf);

}

// Search Products

function searchProducts() {

    var search = document.getElementById("search");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("products").innerHTML = Response;
        }
    };

    Request.open("GET", "loadProducts.php?search=" + search.value, true);
    Request.send();

}

// Product Status

function productStatus(id) {

    var ProductStatus = document.getElementById("productStatus" + id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Deactivated") {
                ProductStatus.className = "btn btn-info text-white fw-bold mt-4 ms-1";
                ProductStatus.innerHTML = "Unblock";
            } else if (Response == "Activated") {
                ProductStatus.className = "btn btn-warning text-white fw-bold mt-4 ms-1";
                ProductStatus.innerHTML = "Block";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "productStatusProcess.php?id=" + id, true);
    Request.send();

}

// Delete Product

function deleteProduct(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "deleteProductProcess.php?id=" + id, true);
    Request.send();

}

// UpdateProduct

function updateProduct(id) {

    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var dwk = document.getElementById("dwk");
    var dok = document.getElementById("dok");
    var description = document.getElementById("des");

    var form = new FormData();
    form.append("id", id);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("dwk", dwk.value);
    form.append("dok", dok.value);
    form.append("des", description.value);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                alert("Success.");
                window.location = "manageProducts.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "updateProductProcess.php", true);
    Request.send(form);

}

//Kadmin search selling history products

function searchSellHis() {

    var kfrom = document.getElementById("kfrom");
    var kto = document.getElementById("kto");

    var kr = new XMLHttpRequest();

    kr.onreadystatechange = function() {
        if (kr.readyState == 4) {
            var ktext = kr.responseText;
            document.getElementById("sellhis").innerHTML = ktext;
        }
    };

    kr.open("GET", "loadSellingHistory.php?kfrom=" + kfrom.value + "&kto=" + kto.value, true);
    kr.send();

}

//Kadmin sign out

function adminSignOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "adminSignIn.php";
            }
        }
    };

    r.open("POST", "signOutProcess.php", true);
    r.send();

}

// District

function district() {

    var province = document.getElementById("province");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("district").innerHTML = Response;
        }
    };

    Request.open("GET", "districtProcess.php?province=" + province.value, true);
    Request.send();

}

// BuyNow

function buyNow(id) {

    var qty = document.getElementById("qty").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;
    var postalcode = document.getElementById("postalcode").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;

    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(postalcode.value);
    // alert(province.value);
    // alert(district.value);
    // alert(id);
    // alert(qty.value);

    var form = new FormData();
    form.append("line1", line1);
    form.append("line2", line2);
    form.append("city", city);
    form.append("postalcode", postalcode);
    form.append("province", province);
    form.append("district", district);
    form.append("product_id", id);
    form.append("qty", qty);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;

            // alert(Response);

            if (Response == "Please Sign In First") {
                swal({
                    title: "Please Sign In First.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Request") {
                swal({
                    title: "Invalid Request.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Add a Quantity") {
                swal({
                    title: "Please Add a Quantity.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Add a Valid Quantity") {
                swal({
                    title: "Please Add a Valid Quantity.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Address Line 1") {
                swal({
                    title: "Please Enter Address Line 1.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your City") {
                swal({
                    title: "Please Enter Your City.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your Postal Code") {
                swal({
                    title: "Please Enter Your Postal Code.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Postal Code") {
                swal({
                    title: "Invalid Postal Code.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Product") {
                swal({
                    title: "Invalid Product.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid User") {
                swal({
                    title: "Invalid User.",
                    icon: "error",
                    button: "Ok",
                });
            } else {

                var Payment_Details = JSON.parse(Response);

                var orderid = Payment_Details["orderid"];
                var total = Payment_Details["price"];
                var delivery_address = Payment_Details["delivery_address"];
                var delivery_city = Payment_Details["delivery_city"];

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderid, qty, total, delivery_address, delivery_city, id, postalcode, district, province);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                    k.hide();
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                    k.hide();
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218128", // Replace your Merchant ID
                    "return_url": "http://localhost/Access_computers/ViewProduct.php?id=" + id, // Important
                    "cancel_url": "http://localhost/Access_computers/ViewProduct.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": Payment_Details["orderid"],
                    "items": Payment_Details["title"],
                    "amount": Payment_Details["price"],
                    "currency": "LKR",
                    "first_name": Payment_Details["fname"],
                    "last_name": Payment_Details["lname"],
                    "email": Payment_Details["email"],
                    "address": Payment_Details["address"],
                    "city": Payment_Details["city"],
                    "country": "Sri Lanka",
                    "delivery_address": Payment_Details["delivery_address"],
                    "delivery_city": Payment_Details["delivery_city"],
                    "delivery_country": "Sri Lanka"
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                payhere.startPayment(payment);
                k.hide();

            }

        }
    };

    Request.open("POST", "buyNowProcess.php", true);
    Request.send(form);

}

function saveInvoice(orderid, qty, total, delivery_address, delivery_city, id, postalcode, district, province) {

    // alert(orderid);
    // alert(qty);
    // alert(total);
    // alert(delivery_address);
    // alert(delivery_city);
    // alert(id);
    // alert(postalcode);
    // alert(district);
    // alert(province);

    var form = new FormData();
    form.append("orderid", orderid);
    form.append("qty", qty);
    form.append("total", total);
    form.append("delivery_address", delivery_address);
    form.append("delivery_city", delivery_city);
    form.append("product_id", id);
    form.append("postalcode", postalcode);
    form.append("district", district);
    form.append("province", province);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "invoice.php?oid=" + orderid;
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
            // alert(Response);
        }
    };

    Request.open("POST", "saveInvoiceProcess.php", true);
    Request.send(form);

}

// Print Div

function printDiv() {

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}

// ChangeQuantity

function changeQuantity(id) {

    var qty = document.getElementById("qty" + id);

    //alert(qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location.reload();
            } else {
                document.getElementById("error").innerHTML = text;
            }
        }
    };

    r.open("GET", "changeQuantityProcess.php?id=" + id + "&qty=" + qty.value, true);
    r.send();

}

// Kgo To Check Out

function goToCheckOut() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "checkOut.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "goToCheckOutProcess.php", true);
    Request.send();

}

// Check Out

function checkOut() {

    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;
    var postalcode = document.getElementById("postalcode").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;

    // alert(line1);
    // alert(line2);
    // alert(city);
    // alert(postalcode);
    // alert(province);
    // alert(district);

    var form = new FormData();
    form.append("line1", line1);
    form.append("line2", line2);
    form.append("city", city);
    form.append("postalcode", postalcode);
    form.append("province", province);
    form.append("district", district);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Please Sign In First") {
                swal({
                    title: "Please Sign In First.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Address Line 1") {
                swal({
                    title: "Please Enter Address Line 1.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your City") {
                swal({
                    title: "Please Enter Your City.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your Postal Code") {
                swal({
                    title: "Please Enter Your Postal Code.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Postal Code") {
                swal({
                    title: "Invalid Postal Code.",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid User") {
                swal({
                    title: "Invalid User.",
                    icon: "error",
                    button: "Ok",
                });
            } else {

                var PaymentDetails = JSON.parse(Response);

                var orderid = PaymentDetails["orderid"];
                var total = PaymentDetails["price"];
                var delivery_address = PaymentDetails["delivery_address"];
                var delivery_city = PaymentDetails["delivery_city"];

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveCheckOutInvoice(orderid, total, delivery_address, delivery_city, postalcode, district, province);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218128", // Replace your Merchant ID
                    "return_url": "http://localhost/Access_computers/Cart.php", // Important
                    "cancel_url": "http://localhost/Access_computers/Cart.php", // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": PaymentDetails["orderid"],
                    "items": PaymentDetails["title"],
                    "amount": PaymentDetails["price"],
                    "currency": "LKR",
                    "first_name": PaymentDetails["fname"],
                    "last_name": PaymentDetails["lname"],
                    "email": PaymentDetails["email"],
                    "address": PaymentDetails["address"],
                    "city": PaymentDetails["city"],
                    "country": "Sri Lanka",
                    "delivery_address": PaymentDetails["delivery_address"],
                    "delivery_city": PaymentDetails["delivery_city"],
                    "delivery_country": "Sri Lanka"
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                payhere.startPayment(payment);

            }
        }
    };

    Request.open("POST", "checkOutProcess.php", true);
    Request.send(form);

}

function saveCheckOutInvoice(orderid, total, delivery_address, delivery_city, postalcode, district, province) {

    var form = new FormData();
    form.append("orderid", orderid);
    form.append("total", total);
    form.append("delivery_address", delivery_address);
    form.append("delivery_city", delivery_city);
    form.append("postalcode", postalcode);
    form.append("district", district);
    form.append("province", province);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "invoice.php?oid=" + orderid;
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "saveCheckOutInvoiceProcess.php", true);
    Request.send(form);

}

// Upload Image

function uploadImage() {
    var image = document.getElementById("profile");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

// Update Profile

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var img = document.getElementById("profile");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("line1", line1.value);
    form.append("line2", line2.value);
    form.append("province", province.value);
    form.append("district", district.value);
    form.append("city", city.value);
    form.append("postalcode", postalcode.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "userProfileProcess.php", true);
    Request.send(form);

}

// Remove Pic

function removePic() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "removeUserProfilePicProcess.php", true);
    Request.send();

}

// Verify account

function verify_Account() {

    code();

    var m = document.getElementById("code");
    bm = new bootstrap.Modal(m);
    bm.show();

}

function AC() {

    var email = document.getElementById("email");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("email", email.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "codeProcess.php", true);
    r.send(form);

}

// Open Feedback Modal

function openFeedbackModal(id) {

    var FeedbackModal = document.getElementById("feedbackmodal" + id);

    k = new bootstrap.Modal(FeedbackModal);
    k.show();

}

// Send Feed back

function sendFeedback(id) {

    var content = document.getElementById("content" + id);

    var form = new FormData();
    form.append("content", content.value);
    form.append("product_id", id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                k.hide();
                var AlertModal = document.getElementById("alertmodal");
                k = new bootstrap.Modal(AlertModal);
                k.show();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "saveFeedbackProcess.php", true);
    Request.send(form);

}

// Reload

function reload() {

    k.hide();
    window.location.reload();

}

// Search

function search() {

    var search = document.getElementById("search");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function() {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("product").innerHTML = Response;
        }
    };

    Request.open("GET", "searchProcess.php?search=" + search.value, true);
    Request.send();

}