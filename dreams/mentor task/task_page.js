const button = document.querySelector('.button_assigned');
const button_missing = document.querySelector('.button_missing');
const button_done = document.querySelector('.button_done');

function removeActiveClass() {
  button.classList.remove('active');
  button_missing.classList.remove('active');
  button_done.classList.remove('active');
}

button.addEventListener('click', function() {
  removeActiveClass();
  button.classList.toggle('active');
});

button_missing.addEventListener('click', function() {
  removeActiveClass();
  button_missing.classList.toggle('active');
});

button_done.addEventListener('click', function() {
  removeActiveClass();
  button_done.classList.toggle('active');
});

var tabButtons=document.querySelectorAll(".tabContainer .button_container img");
var tabPanels=document.querySelectorAll(".tabContainer  .tabpanel");

const container = document.querySelector('.tabContainer .tabpanel');
const tabs = document.querySelectorAll('.tabContainer .tabpanel .as_tabs');
const tabHeight = tabs[0].offsetHeight;
const numTabs = tabs.length;
const containerHeight = tabHeight * numTabs;
// container.style.height = containerHeight + 'px';

function showPanel(panelIndex, colorCode) {
  tabButtons.forEach(function (node) {
    node.style.backgroundColor = "";
    node.style.color = "";
  });
  tabButtons[panelIndex].style.backgroundColor = colorCode;
  tabButtons[panelIndex].style.color = "white";
  tabPanels.forEach(function (node) {
    node.style.display="none";
    node.classList.remove("active"); // remove active class from all panels
  });
  tabPanels[panelIndex].style.display="block";
  tabPanels[panelIndex].classList.add("active"); // add active class to selected panel

}

