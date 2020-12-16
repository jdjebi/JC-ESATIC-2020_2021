<style media="screen">
body{
  background-color: #f1f3f6
}

.section-about {
  padding-top: 40px;
  position: relative;
}

.section-about .section-box {
    padding: 0px;
}

.section-box{
  background-color: rgb(255, 255, 255);
}

.section-about .profile {
    padding: 57px 50px 15px 50px;
}

.section-about .profile-info {
    color: #3d4451;
    padding-bottom: 25px;
    margin-bottom: 25px;
    border-bottom: 1px solid #dedede;
}

.profile-items {
    margin-bottom: 18px;
}

.profile-preword {
    float: left;
    margin-bottom: 10px;
}

.profile-preword span{
  background-color: #333;
  color: #fff;
  font-size: 14px;
  font-weight: 700;
  line-height: 1.1;
  display: inline-block;
  padding: 7px 12px;
  text-transform: uppercase;
  position: relative;
}



.profile-preword span:before {
    content: '';
    width: 0;
    height: 0;
    top: 100%;
    left: 5px;
    display: block;
    position: absolute;
    border-style: solid;
    border-width: 0 0 8px 8px;
    border-color: transparent;
    border-left-color: #333;
}

.section-about .profile-title {
    font-size: 24px;
    line-height: 1.1;
    font-weight: 700;
    margin-bottom: 5px;
}

.section-about .profile-title span {
    font-weight: 300;
}

.section-about .profile-position {
    font-size: 15px;
    line-height: 1.1;
    margin-bottom: 0;
}

.profile-list {
    margin: 0;
    padding: 0;
    list-style: none;
}

.profile-list li {
    margin-bottom: 13px;
}

.profile-list .title {
    display: block;
    width: 120px;
    float: left;
    color: #333333;
    font-size: 12px;
    font-weight: 700;
    line-height: 20px;
    text-transform: uppercase;
}
.profile-list .cont {
    display: block;
    margin-left: 125px;
    font-size: 15px;
    font-weight: 400;
    line-height: 20px;
}

@media (max-width: 767px){

  .profile-info {
      text-align: center;
  }

  .profile-preword {
      float: none;
  }


  .profile-preword span {
      min-width: 150px;
      padding: 9px 12px;
  }

  .profile-list .title {
      margin-bottom: 3px;
  }

  .profile-list .title, .profile-list .cont {
      width: 100%;
      float: none;
      line-height: 1.2;
  }

  .profile-list .cont {
    margin-left: 0;
    margin-bottom: 15px;
  }

}
</style>
