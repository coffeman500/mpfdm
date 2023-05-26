/**
 * Handles setting and retrieving of cookies
 * 
 */

/**
 * Sets a cookie in the browser
 * 
 * @param {*} cname : Name of the cookie
 * @param {*} cvalue : Value being stored to the cookie
 * @param {*} exdays : Cookie expiration in days
 */
window.setCookie = (cname, cvalue, exdays) => {
	const d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	let expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

window.getCookie = (cname) => {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}