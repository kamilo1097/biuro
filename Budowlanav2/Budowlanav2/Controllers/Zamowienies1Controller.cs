﻿using System;
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
    public class Zamowienies1Controller : Controller
    {
        private OrderDbContext db = new OrderDbContext();

        // GET: Zamowienies1
        public ActionResult Index()
        {
            return View(db.Zamowienia.ToList());
        }

        // GET: Zamowienies1/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Zamowienie zamowienie = db.Zamowienia.Find(id);
            if (zamowienie == null)
            {
                return HttpNotFound();
            }
            return View(zamowienie);
        }

        // GET: Zamowienies1/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Zamowienies1/Create
        // Aby zapewnić ochronę przed atakami polegającymi na przesyłaniu dodatkowych danych, włącz określone właściwości, z którymi chcesz utworzyć powiązania.
        // Aby uzyskać więcej szczegółów, zobacz https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Imie,NumerTel,Email,KryDachow,OciepPoddaszy,UkladPaneli,Malowanie,Szpachlowanie,KartonGipsy,Glazura,Terakota,OciepDom,NapDachow,NapPoddaszy,NapKartonGipsy,NapGlazura,NapTerakota,BudAltan,BudGrill,BudDrewutni,Skonczone")] Zamowienie zamowienie)
        {
            if (ModelState.IsValid)
            {
                db.Zamowienia.Add(zamowienie);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(zamowienie);
        }

        // GET: Zamowienies1/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Zamowienie zamowienie = db.Zamowienia.Find(id);
            if (zamowienie == null)
            {
                return HttpNotFound();
            }
            return View(zamowienie);
        }

        // POST: Zamowienies1/Edit/5
        // Aby zapewnić ochronę przed atakami polegającymi na przesyłaniu dodatkowych danych, włącz określone właściwości, z którymi chcesz utworzyć powiązania.
        // Aby uzyskać więcej szczegółów, zobacz https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Imie,NumerTel,Email,KryDachow,OciepPoddaszy,UkladPaneli,Malowanie,Szpachlowanie,KartonGipsy,Glazura,Terakota,OciepDom,NapDachow,NapPoddaszy,NapKartonGipsy,NapGlazura,NapTerakota,BudAltan,BudGrill,BudDrewutni,Skonczone")] Zamowienie zamowienie)
        {
            if (ModelState.IsValid)
            {
                db.Entry(zamowienie).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(zamowienie);
        }

        // GET: Zamowienies1/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Zamowienie zamowienie = db.Zamowienia.Find(id);
            if (zamowienie == null)
            {
                return HttpNotFound();
            }
            return View(zamowienie);
        }

        // POST: Zamowienies1/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Zamowienie zamowienie = db.Zamowienia.Find(id);
            db.Zamowienia.Remove(zamowienie);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
