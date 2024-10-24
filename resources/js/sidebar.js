export function openSidebar() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";

}export function collapseSidebar() {
    document.getElementById("sidebar").style.width = "65px";
    document.getElementById("main").style.marginLeft = "65px";
}
