using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace FinalAutoLibrary.Models
{

    public class Book
    {

        [Key] public long ISBNId { get; set; }
        public string Title { get; set; }
        public string AuthorLast { get; set; }
        public string AuthorFirst { get; set; }
        public string Genre { get; set; }
        public int Year { get; set; }
        public bool? CheckedOut { get; set; }
        public string UserEmail { get; set; }
        public DateTime? ReturnDate { get; set; }

    }
}