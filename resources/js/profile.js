import DOMPurify from "dompurify";
import axios from "axios";

export default class Profile {
  constructor() {
    this.links = document.querySelectorAll(".profile-nav a");
    this.contentArea = document.querySelector(".profile-slot-content");
    this.events();
  }

  // events
  events() {
    window.addEventListener("popstate", () => {
      this.handleChange();
    });
    this.links.forEach(link => {
      link.addEventListener("click", e => this.handleLinkClick(e));
    });
    this.handleChange(); // To handle the initial load
  }

  async handleChange() {
    this.links.forEach(link => link.classList.remove("active"));
    const activeLink = Array.from(this.links).find(link => link.getAttribute("href") === window.location.pathname);
    if (activeLink) {
      const response = await axios.get(activeLink.href + "/raw");
      this.contentArea.innerHTML = DOMPurify.sanitize(response.data.theHtml);
      document.title = response.data.Pagetitle + " | OurApp";
      activeLink.classList.add("active");
    }
  }

  // methods
  async handleLinkClick(e) {
    e.preventDefault();
    this.links.forEach(link => link.classList.remove("active"));
    e.target.classList.add("active");
    const response = await axios.get(e.target.href + "/raw");
    this.contentArea.innerHTML = DOMPurify.sanitize(response.data.theHtml);
    document.title = response.data.Pagetitle + " | OurApp";
    history.pushState({}, "", e.target.href);
  }
}
