<style media="screen">
    body{
      background-color: #fff
    }
    .upload-btn-wrapper{
      position: relative;
      overflow: hidden;
    }
    .upload-btn-wrapper input[type=file] {
      font-size: 100px;
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
    }
    .upload-btn-wrapper button{
      cursor: pointer;
    }
  
    #upload-file-input{
      opacity: 0;
    }
  </style>
  <style>
    .menu{
      background-color: #fff;
      border: 1px solid #e1e4e8;
      border-radius: 6px;
    }
    .menu a{
      text-decoration: none
    }
    .menu-heading {
      display: block;
      padding: 8px 16px;
      margin-top: 0;
      margin-bottom: 0;
      font-size: inherit;
      font-weight: 600;
      color: #1b1f23;
      border-bottom: 1px solid #eaecef;
    }
    .menu-item{
      position: relative;
      display: block;
      padding: 8px 16px;
      color: #1b1f23;
      border-bottom: 1px solid #eaecef;
      font-size: 14px;
    }
    .menu-item:focus, .menu-item:hover {
      color: #1b1f23;
      text-decoration: none;
      background-color: #f6f8fa;
      outline: none;
    }
    .menu-item:last-child {
      border-bottom: 0;
      border-bottom-right-radius: 6px;
    }
    .menu-item.active{
      background-color: #eefaff;
      font-weight: 500
    }
    .avatar-user {
      border-radius: 50%!important;
    }
  
    .avatar {
      display: inline-block;
      overflow: hidden;
      line-height: 1;
      vertical-align: middle;
      border-radius: 6px;
    }
  
    .f5 {
      font-size: 14px!important;
    }
    .f6 {
        font-size: 12px!important;
    }
  
    .text-gray {
      color: #586069!important;
    }
    .text-gray-dark {
      color: #24292e!important;
    }
    .text-normal {
      font-weight: 400!important;
    }
    .text-bold {
      font-weight: 600!important;
    }
  
    .lh-condensed {
        line-height: 1.25!important;
    }
  
    .css-truncate.css-truncate-target, .css-truncate .css-truncate-target {
        display: inline-block;
        max-width: 125px;
        vertical-align: top;
    }
    .css-truncate.css-truncate-target, .css-truncate .css-truncate-target {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<style>
    .resac-account-card-support{
        border: none
    }
    .resac-account-card-support .card-header{
        background-color: #fff;
        font-size: 24px;
        font-weight: 400;
        padding-left: 0;
        padding-top: 0
    }
    .resac-account-card-support .card-body{
        padding-left: 0;
    }
    .resac-account-card-support label{
        font-weight: 600;
        font-size: 14px;
    }
</style>
<style>
    .resac-account-card-support .form-control {
        max-width: 100%;
        background-color: #fafbfc;
        padding: 5px 12px;
        font-size: 14px;
        line-height: 20px;
        color: #24292e;
        vertical-align: middle;
        background-repeat: no-repeat;
        background-position: right 8px center;
        border: 1px solid #e1e4e8;
        border-radius: 6px;
        outline: none;
        box-shadow: inset 0 1px 0 rgba(225,228,232,.2);
    }
</style>