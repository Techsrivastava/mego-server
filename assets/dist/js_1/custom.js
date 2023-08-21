$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});


/*--three-fold-effect--*/
/*--
const { useState } = React;
const rootElement = document.getElementById("root");

const Flight = [
  {
    src: "https://beebom.com/wp-content/uploads/2018/12/Lufthansa-Logo.jpg",
    style: {
      height: "51px",
      margin: "22px 12px"
    },
    label: "rgb(13, 28, 83)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2015/02/airline-logos-qatar-e1424574584611.png",
    style: {
      height: "26px",
      margin: "34px 16px"
    },
    label: "rgb(90, 5, 49)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2015/02/airline-logos-swiss.png",
    style: {
      height: "23px",
      margin: "41px 12px"
    },
    label: "rgb(230, 26, 56)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2018/12/Singapore-Airlines-logo.jpg",
    style: {
      height: "46px",
      margin: "22px 15px"
    },
    label: "rgb(252, 178, 50)"
  },
  {
    src: "https://beebom.com/wp-content/uploads/2018/12/Lufthansa-Logo.jpg",
    style: {
      height: "51px",
      margin: "22px 12px"
    },
    label: "rgb(13, 28, 83)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2015/02/airline-logos-qatar-e1424574584611.png",
    style: {
      height: "26px",
      margin: "34px 16px"
    },
    label: "rgb(90, 5, 49)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2015/02/airline-logos-swiss.png",
    style: {
      height: "23px",
      margin: "41px 12px"
    },
    label: "rgb(230, 26, 56)"
  },
  {
    src:
      "https://beebom.com/wp-content/uploads/2018/12/Singapore-Airlines-logo.jpg",
    style: {
      height: "46px",
      margin: "22px 15px"
    },
    label: "rgb(252, 178, 50)"
  }
];

const Cell = (props)=> {
  const { index } = props;
  const [active, handleActive] = useState(false);
	
  return (
    <div
      id="cardContainer"
      style={{
        height: active ? `300px` : `100px`,
        transition: "0.9s"
      }}
      onClick={() => {
        handleActive(!active);
      }}
    >
      <div id="firstDisplay">
        <div id="flightDetail">
          <div
            id="detailLabel"
            style={{ fontWeight: "bold", color: Flight[index].label }}
          >
            From
          </div>
          BLR
          <div id="detailLabel">Kempegowda International</div>
        </div>
        <div
          id="flightDetail"
          style={{
            marginTop: "15px"
          }}
        >
          <div id="animContainer">
            <div id="anim">
              <div id="circle" />
              <div id="circle" />
              <div id="circle" />
            </div>
          </div>
          <div id="animContainer" style={{ left: "62px" }}>
            <div id="anim">
              <div id="circle" />
              <div id="circle" />
              <div id="circle" />
            </div>
          </div>
          <img
            style={{ width: "30px" }}
            src="https://github.com/pizza3/asset/blob/master/airplane2.png?raw=true"
          />
        </div>
        <div id="flightDetail">
          <div
            id="detailLabel"
            style={{ fontWeight: "bold", color: Flight[index].label }}
          >
            To
          </div>
          DEL
          <div id="detailLabel">Indira Gandhi International</div>
        </div>
      </div>
      <div
        id="first"
        style={{
          transform: active
            ? `rotate3d(1, 0, 0, -180deg)`
            : `rotate3d(1, 0, 0, 0deg)`,
          transitionDelay: active ? "0s" : "0.3s"
        }}
      >
        <div id="firstTop">
          <img style={Flight[index].style} src={Flight[index].src} />
          <div id="timecontainer">
            <div id="detailDate">
              Bengaluru
              <div id="detailTime">6:20</div>
              June 12
            </div>
            <img
              style={{
                width: "30px",
                height: "26px",
                marginTop: "22px",
                marginLeft: "16px",
                marginRight: "16px"
              }}
              src="https://github.com/pizza3/asset/blob/master/airplane2.png?raw=true"
            />
            <div id="detailDate">
              New Delhi
              <div id="detailTime">8:45</div>
              June 12
            </div>
          </div>
        </div>
        <div id="firstBehind">
          <div id="firstBehindDisplay">
            <div id="firstBehindRow">
              <div id="detail">
                6:20 - 8:45
                <div id="detailLabel">Flight Time</div>
              </div>
              <div id="detail">
                No
                <div id="detailLabel">Transfer</div>
              </div>
            </div>
            <div id="firstBehindRow">
              <div id="detail">
                2h 25 min
                <div id="detailLabel">Duration</div>
              </div>
              <div id="detail">
                8<div id="detailLabel">Gate</div>
              </div>
            </div>
            <div id="firstBehindRow">
              <div id="detail">
                5:35
                <div id="detailLabel">Boarding</div>
              </div>
              <div id="detail">
                20A
                <div id="detailLabel">Seat</div>
              </div>
            </div>
          </div>
          <div
            id="second"
            style={{
              transform: active
                ? `rotate3d(1, 0, 0, -180deg)`
                : `rotate3d(1, 0, 0, 0deg)`,
              transitionDelay: active ? "0.2s" : "0.2s"
            }}
          >
            <div id="secondTop" />
            <div id="secondBehind">
              <div id="secondBehindDisplay">
                <div id="price">
                  $100
                  <div id="priceLabel">Price</div>
                </div>
                <div id="price">
                  Economy
                  <div id="priceLabel">Class</div>
                </div>
                <img
                  id="barCode"
                  src="https://github.com/pizza3/asset/blob/master/barcode.png?raw=true"
                />
              </div>
              <div
                id="third"
                style={{
                  transform: active
                    ? `rotate3d(1, 0, 0, -180deg)`
                    : `rotate3d(1, 0, 0, 0deg)`,
                  transitionDelay: active ? "0.4s" : "0s"
                }}
              >
                <div id="thirdTop" />
                <div id="secondBehindBottom">
                  <button
                    id="button"
                    style={{
                      color: Flight[index].label,
                      border: `1px solid ${Flight[index].label}`
                    }}
                  >
                    Pay
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}


const Header = (
  <div>
    <svg
      id="back"
      xmlns="http://www.w3.org/2000/svg"
      width="512"
      height="512"
      viewBox="0 0 512 512"
    >
      <polyline
        points="244 400 100 256 244 112"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "48px"
        }}
      />
      <line
        x1="120"
        y1="256"
        x2="412"
        y2="256"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "48px"
        }}
      />
    </svg>
    <div id="headerText">Select Flight</div>
    <div id="tripDetail">
      Your Trip
      <div id="tripDest">
        BLR - DEL<div id="oneWay">One Way</div>
        <div />
      </div>
      12th June, 2020
    </div>
    <svg
      id="settings"
      xmlns="http://www.w3.org/2000/svg"
      width="512"
      height="512"
      viewBox="0 0 512 512"
    >
      <line
        x1="368"
        y1="128"
        x2="448"
        y2="128"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <line
        x1="64"
        y1="128"
        x2="304"
        y2="128"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <line
        x1="368"
        y1="384"
        x2="448"
        y2="384"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <line
        x1="64"
        y1="384"
        x2="304"
        y2="384"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <line
        x1="208"
        y1="256"
        x2="448"
        y2="256"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <line
        x1="64"
        y1="256"
        x2="144"
        y2="256"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <circle
        cx="336"
        cy="128"
        r="32"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <circle
        cx="176"
        cy="256"
        r="32"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
      <circle
        cx="336"
        cy="384"
        r="32"
        style={{
          fill: "none",
          stroke: "#000",
          strokeLinecap: "round",
          strokeLinejoin: "round",
          strokeWidth: "32px"
        }}
      />
    </svg>
  </div>
);

const DataArr = Array(8)
  .fill(0)
  .map(Number.call, Number);
const App = () => {
  return (
    <div className="App">
      {Header}
     {DataArr.map((val, i) => (
        <Cell key={i} index={i} />
      ))}
    </div>
  );
}

ReactDOM.render(<div><App/></div>,rootElement);	  */

/*---------------------------calendar js------------------------------*/



/*---------------------------calendar next prev form------------------------------*/

$(document).ready(function(){

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;

	setProgressBar(current);

	$(".next").click(function(){

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//Add Class Active
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
	step: function(now) {
	// for making fielset appear animation
	opacity = 1 - now;

	current_fs.css({
	'display': 'none',
	'position': 'relative'
	});
	next_fs.css({'opacity': opacity});
	},
	duration: 500
	});
	setProgressBar(++current);
	});

	$(".previous").click(function(){

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//Remove class active
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();

	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
	step: function(now) {
	// for making fielset appear animation
	opacity = 1 - now;

	current_fs.css({
	'display': 'none',
	'position': 'relative'
	});
	previous_fs.css({'opacity': opacity});
	},
	duration: 500
	});
	setProgressBar(--current);
	});

	function setProgressBar(curStep){
	var percent = parseFloat(100 / steps) * curStep;
	percent = percent.toFixed();
	$(".progress-bar")
	.css("width",percent+"%")
	}

	$(".submit").click(function(){
	return false;
	})

	});
	  
