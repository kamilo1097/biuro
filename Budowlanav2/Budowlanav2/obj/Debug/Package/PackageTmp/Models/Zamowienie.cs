using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace Budowlanav2.Models
{
    [Table("Orders")]
    public class Zamowienie
    {
        [Key]
        public int Id { get; set; }
        [Required(ErrorMessage = "Proszę podać imię")]
        public string Imie { get; set; }
        [DataType(DataType.PhoneNumber)]
        [Phone(ErrorMessage = "Nieprawidłowy nr Telefonu")]
        public string NumerTel { get; set; }

        [EmailAddress(ErrorMessage = "Błędny format adresu e-mail")]
        public string Email { get; set; }

        public bool KryDachow { get; set; }
        public bool OciepPoddaszy { get; set; }
        public bool UkladPaneli { get; set; }
        public bool Malowanie { get; set; }
        public bool Szpachlowanie { get; set; }
        public bool KartonGipsy { get; set; }
        public bool Glazura { get; set; }
        public bool Terakota { get; set; }
        public bool OciepDom { get; set; }
        public bool NapDachow { get; set; }
        public bool NapPoddaszy { get; set; }
        public bool NapKartonGipsy { get; set; }
        public bool NapGlazura { get; set; }
        public bool NapTerakota { get; set; }
        public bool BudAltan { get; set; }
        public bool BudGrill { get; set; }
        public bool BudDrewutni { get; set; }

        public bool Skonczone { get; set; }

    }
}