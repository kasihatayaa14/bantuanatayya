<style>
    body{
        font-family: 'Poppins', sans-serif;
        background: #fff0f6;
    }

    .login-wrapper{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 15px;
        position: relative;
        overflow: hidden;
    }

    .login-wrapper::before{
        content: '';
        position: absolute;
        width: 350px;
        height: 350px;
        background: rgba(255,77,166,0.15);
        border-radius: 50%;
        top: -120px;
        right: -120px;
    }

    .login-wrapper::after{
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,77,166,0.15);
        border-radius: 50%;
        bottom: -120px;
        left: -120px;
    }

    .login-card{
        width: 100%;
        max-width: 1000px;
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(255,77,166,0.15);
        position: relative;
        z-index: 2;
    }

    .left-side{
        background: linear-gradient(135deg,#ff4da6,#ff80bf);
        color: white;
        padding: 60px 40px;
        height: 100%;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .left-side i{
        font-size: 70px;
        margin-bottom: 20px;
    }

    .left-side h2{
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .left-side p{
        font-size: 17px;
        line-height: 1.8;
    }

    .right-side{
        padding: 60px 50px;
    }

    .login-title{
        font-size: 38px;
        font-weight: 700;
        color: #ff4da6;
    }

    .login-subtitle{
        color: #6c757d;
        margin-bottom: 35px;
    }

    .form-label{
        font-weight: 600;
        color: #ff4da6;
    }

    .input-group{
        position: relative;
    }

    .input-group i{
        position: absolute;
        top: 18px;
        left: 15px;
        color: #ff4da6;
        z-index: 5;
    }

    .form-control{
        height: 55px;
        border-radius: 12px;
        padding-left: 45px;
        border: 1px solid #ffc2dd;
    }

    .form-control:focus{
        border-color: #ff4da6;
        box-shadow: 0 0 0 0.15rem rgba(255,77,166,.2);
    }

    .btn-login{
        height: 55px;
        border-radius: 12px;
        background: linear-gradient(135deg,#ff4da6,#ff80bf);
        border: none;
        font-size: 17px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-login:hover{
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(255,77,166,.3);
        background: linear-gradient(135deg,#ff3399,#ff66b3);
    }

    .form-check-input:checked{
        background-color: #ff4da6;
        border-color: #ff4da6;
    }

    a{
        color: #ff4da6;
    }

    a:hover{
        color: #e60073;
    }

    @media(max-width:768px){

        .left-side{
            display: none;
        }

        .right-side{
            padding: 40px 25px;
        }

        .login-title{
            font-size: 30px;
        }
    }
</style>