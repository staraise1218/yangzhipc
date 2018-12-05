var Global = (function () {



  //绑定展开事件
  function bindOpenDiv() {
    if ($(".indexOpen").length > 0) {
      let $div = $(`
        <div class="openDiv" style="display: none;">
          <ul>
            <li>
              <a href="trainingProgram.html">项目培训</a>
            </li>
            <li>
              <a href="trainingVideo.html">培训视频</a>
            </li>
            <li>
              <a href="signup.html">联系我们</a>
            </li>
          </ul>
        </div>
      `)
      $("body").append($div)

      $(".indexOpen").click(function () {
        $(".openDiv").show()
        $(".openDiv>ul").css("transform", "translate(0,0)");
      })
      $(".openDiv").click(function () {
        console.log(event)
        if ($(event.target).hasClass("openDiv")) {
          $(".openDiv>ul").css("transform", "translate(100%,0)");
          setTimeout(function () {
            $(".openDiv").hide()
          }, 200)
        }
      })
    }
  }
  //------------------------------------------------------------------------------------------
  return {
    //绑定事件
    bindOpenDiv
  }
})()

window.onload = function () {
  Global.bindOpenDiv()
}