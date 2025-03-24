const menu = document.getElementById("exportMenu");
const button = document.getElementById("dropdownButton");

function toggleDropdown() {
    menu.classList.toggle("hidden");
}

document.addEventListener("click", function (event) {
    if (!menu.contains(event.target) && !button.contains(event.target)) {
        menu.classList.add("hidden");
    }
});

function closeDropdownAfterClick(event) {
    event.preventDefault();
    menu.classList.add("hidden");
}

function downloadGrafikTIPE(tipe) {
    const element = document.getElementById("grafikContainer");

    // Sembunyikan tombol dropdown dan menu sebelum export
    const dropdown = document.getElementById("exportMenu");
    const toggleButton = document.getElementById("dropdownButton");

    dropdown.style.display = "none";
    toggleButton.style.display = "none";

    // Tunggu sebentar untuk memastikan DOM update
    setTimeout(() => {
        html2canvas(element, {
            useCORS: true,
            backgroundColor: '#ffffff',
            onclone: (clonedDoc) => {
                const allElements = clonedDoc.querySelectorAll("*");
                allElements.forEach(el => {
                    const computedStyle = getComputedStyle(el);
                    if (computedStyle.backgroundColor.includes("oklch")) {
                        el.style.backgroundColor = "#ffffff";
                    }
                    if (computedStyle.color.includes("oklch")) {
                        el.style.color = "#000000";
                    }
                });
            }
        }).then(canvas => {
            if (tipe === "png" || tipe === "jpeg") {
                const link = document.createElement("a");
                link.download = `grafik-ip.${tipe}`;
                link.href = canvas.toDataURL(`image/${tipe}`);
                link.click();
            } else if (tipe === "pdf") {
                const imgData = canvas.toDataURL("image/png");
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                pdf.addImage(imgData, 'PNG', 10, 10, pdfWidth - 20, pdfHeight);
                pdf.save("grafik-ip.pdf");
            }

            // Tampilkan kembali setelah export selesai
            dropdown.style.display = "block";
            toggleButton.style.display = "block";

        }).catch(error => {
            console.error("Gagal mengunduh grafik:", error);
            alert("Terjadi kesalahan saat mengunduh. Coba lagi atau periksa konsol.");

            // Pastikan tombol ditampilkan kembali walaupun error
            dropdown.style.display = "block";
            toggleButton.style.display = "block";
        });
    }, 100); // Delay kecil agar DOM sempat update
}

// Event listeners
document.getElementById("downloadPNG").addEventListener("click", () => downloadGrafikTIPE("png"));
document.getElementById("downloadJPEG").addEventListener("click", () => downloadGrafikTIPE("jpeg"));
document.getElementById("downloadPDF").addEventListener("click", () => downloadGrafikTIPE("pdf"));
