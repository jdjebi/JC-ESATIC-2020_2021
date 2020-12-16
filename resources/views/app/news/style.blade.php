<style media="screen">
ul.timeline {
  list-style-type: none;
  position: relative;
}
ul.timeline:before {
  content: ' ';
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline > li {
  margin: 20px 0;
  padding-left: 20px;
}
ul.timeline > li:before {
  content: ' ';
  background: #2196F3;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  left: 22px;
  width: 18px;
  height: 18px;
  z-index: 400;
}

@media (max-width: 768px){
  ul.timeline {
    padding: 0;
  }
  ul.timeline > li {
    margin-left: 0;
  }
  ul.timeline:before {
    display: none
  }
  ul.timeline > li:before {
    display: none
  }
  .feature {
    margin-left: 0 !important;
  }
}


</style>
