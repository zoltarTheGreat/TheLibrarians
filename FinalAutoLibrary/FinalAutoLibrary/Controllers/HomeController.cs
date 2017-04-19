using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace FinalAutoLibrary.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult Payments()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Search()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        [Authorize(Roles = "Admin")]
        public ActionResult Admin()
        {
            string apiUrl = Url.HttpRouteUrl("DefaultApi", new { controller = "admin" });
            ViewBag.ApiUrl = new Uri(Request.Url, apiUrl).AbsoluteUri.ToString();
            return View();
        }
    }
}