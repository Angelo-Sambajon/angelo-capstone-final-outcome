document.addEventListener('DOMContentLoaded', function() {

    /* Mobile Navigation */
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('nav');

    hamburger.addEventListener('click', toggleNav);
    nav.addEventListener('click', toggleNav);

    function toggleNav(){
        nav.classList.toggle('open');
        hamburger.classList.toggle('times');
    }

    /* Nav Selected States  */
    const navItems = nodeListToArray(document.querySelectorAll('nav a'));
    const sections = nodeListToArray(document.querySelectorAll('main section'));
    let navIndex = 0;

    /* Loop through nav items to add click event listeners */
    for(navItem of navItems){
        navItem.addEventListener('click', setSelected);
    }
    /* click event handler */
    function onNavClicked(){
        navIndex = navItems.indexOf(this);
        setSelected();
    }
    /* set navItem selected states */
    function setSelected(){
        for(navItem of navItems){
            navItem.classList.remove('selected');
        }
        navItems[navIndex].classList.add('selected');
    }
    /* loop through sections to add waypoints */
    for(section of sections){
        new Waypoint({
            element: section,
            handler: onSectionInView,
            offset: "50%"
          })
    }
    /* waypoint handler */
    function onSectionInView(direction) {
        if(direction=="down"){
            navIndex = sections.indexOf(this.element);
        } else{
            navIndex = sections.indexOf(this.element)-1;
        }
        setSelected();
      }
      /* helper function to convert NodeList into an Array */
    function nodeListToArray(nodeList){
        return Array.prototype.slice.call(nodeList)
    }
})