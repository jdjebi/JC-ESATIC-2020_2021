<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');
body{
    font-family: 'Roboto', sans-serif;
    height: 100vh;
    background: url("{{ asset('asset/imgs/bg2.jpg') }}") no-repeat center center;
    background-size: cover;
}
*{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}
a{
 color: #198022;
}
h2{
    text-align: center;
    font-size: 40px;
    color: white;
}
.doc{
    width: 100%;
    height: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
nav{
    height: 80px;
    background: #198022;
}
nav img{
    width: 30px;
    height: 50px;
    position: absolute;
    top: 17px;
    left: 12%;
}
nav ul{
    float: right;
    margin-right: 25px;
}
nav ul li{
    display: inline-block;
    line-height: 80px;
    margin: 0 15px;
} 
nav ul li a{
    position: relative;
    color: white;
    font-size: 18px;
    text-transform: uppercase;
}
nav ul li a:before{
    position: absolute;
    content: '';
    left: 0;
    bottom: 0;
    height: 3px;
    width: 100%;
    background: white;
    transform: scaleX(0);
    transform-origin: right ;
    transition: transform .4s linear;
}
nav ul li a:hover:before{
    transform: scaleX(1);
    transform-origin: left;
}
label #btn,label #cancel{
    color: white;
    font-size: 30px;
    float: right;
    line-height: 80px;
    margin-right: 40px;
    cursor: pointer;
    display: none;
}
#check{
    display: none;
}
@media (max-width: 1118px){
    nav img{
        left: 8%;
    }
}
@media (max-width: 944px){
    nav img{
        left: 6%;
        top: 20px;
        width: 130px;
    }
    nav ul li a{
        font-size: 17px;
    }
}
@media (max-width: 860px){
    label #btn{
        display: block;
    }
    ul{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #000000;
        top: 80px;
        left: -100%;
        text-align: center;
        transition: all .5s;
    }
    nav ul li{
        display: block;
        margin: 50px 0;
        line-height: 30px;
    }
    nav ul li a{
        font-size: 20px;
    }
    #check:checked ~ ul{
        left: 0;
    }
    #check:checked ~ label #btn{
        display: none;
    }
    #check:checked ~ label #cancel{
        display: block;
    }
}

nav img {
    width: 65px;
    height: 65px;
    position: absolute;
    top: 17px;
    left: 12%;
}

nav {
    height: 80px;
    background: #000000;
}

.btn {
    background: #198022;
    text-align: center;
    padding: 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
}


.wrapper{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    max-width: 400px;
    background: rgba(0,0,0,0.8);
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

.wrapper .title h1{
  color: #ffffff;
  text-align: center;
  margin-bottom: 25px;
}

.contact-form{
  display: flex;
}

.input-fields{
  display: flex;
  flex-direction: column;
  margin-right: 4%;
}

.input-fields,
.msg{
  width: 48%;
}

.input-fields .input,
.msg textarea{
    margin: 10px 0;
    background: transparent;
    border: 0px;
    border-bottom: 2px solid #ffffff;
    padding: 10px;
    color: #ffffff;
    width: 100%;
    font-size: 20px;
    text-align: center;
}

.msg textarea{
  height: 212px;
}

::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  color: #a4e7a9;
}
::-moz-placeholder {
  /* Firefox 19+ */
  color: #a4e7a9;
}
:-ms-input-placeholder {
  /* IE 10+ */
  color: #a4e7a9;
}

.btn {
    background: #198022;
    text-align: center;
    padding: 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
}
i{
  font-size: 30px;
  color: #a4e7a9;
}

@media screen and (max-width: 600px){
  .contact-form{
    flex-direction: column;
  }
  .msg textarea{
    height: 80px;
  }
  .input-fields,
  .msg{
    width: 100%;
  }
}

.input-fields{
            width: 100%;
        }
        .title{
        text-align: center;
        color: white !important;
      }
      .bas{
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }
</style>