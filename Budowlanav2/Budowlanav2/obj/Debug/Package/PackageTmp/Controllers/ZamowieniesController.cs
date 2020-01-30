using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Budowlanav2;
using Budowlanav2.Models;

namespace Budowlanav2.Controllers
{
    public class ZamowieniesController : Controller
    {
        private OrderDbContext db = new OrderDbContext();

        // GET: Zamowienies
        public ActionResult Index()
        {
            return View();
        }
        public ActionResult Uslugi()
        {
            return View();
        }
        

        // GET: Zamowienies/Create
        public ActionResult Create()
        {
            return View();
        }
        public ActionResult Kontakt()
        {
            return View();
        }

        // POST: Zamowienies/Create
        // Aby zapewnić ochronę przed atakami polegającymi na przesyłaniu dodatkowych danych, włącz określone właściwości, z którymi chcesz utworzyć powiązania.
        // Aby uzyskać więcej szczegółów, zobacz https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Imie,NumerTel,Email,BudMurow,KryDachow,PraceWyk,OciepDom,BudAltan,BudGrill,Skonczone")] Zamowienie zamowienie)
        {
            if (ModelState.IsValid)
            {
                db.Zamowienia.Add(zamowienie);
                db.SaveChanges();
                return RedirectToAction("Index");
                
            }
            
            return View(zamowienie);
        }

    }
}
