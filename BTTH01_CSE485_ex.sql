a 
SELECT * from baiviet,theloai 
WHERE ten_tloai = "Nhạc trữ tình" and baiviet.ma_tloai=theloai.ma_tloai
b 
SELECT * FROM baiviet,tacgia 
WHERE baiviet.ma_tgia=tacgia.ma_tgia and ten_tgia = "Nhacvietplus"
c 
SELECT DISTINCT ma_tloai FROM theloai 
WHERE NOT EXISTS(SELECT * FROM baiviet WHERE baiviet.ma_tloai = theloai.ma_tloai)
d
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet 
FROM baiviet,tacgia,theloai WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai
e
SELECT theloai.ten_tloai, COUNT(*) as 'The loai nhieu nhat ' 
FROM baiviet 
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
GROUP BY theloai.ten_tloai 
LIMIT 1
f
SELECT ten_tgia, COUNT(*) AS 'Tac gia co nhieu bai viet nhat' 
FROM baiviet JOIN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia 
GROUP BY ten_tgia 
ORDER BY COUNT(*) DESC 
LIMIT 2;
g
SELECT ma_bviet, tieude, ten_bhat,noidung, ngayviet FROM baiviet 
WHERE tomtat LIKE '%yêu%' OR tomtat LIKE '%thương%' OR tomtat LIKE '%anh%' OR tomtat LIKE '%em%'
 SELECT ma_bviet, tieude, ten_bhat, ngayviet FROM baiviet 
WHERE tomtat LIKE '%yêu%' OR tomtat LIKE '%thương%' OR tomtat LIKE '%anh%' OR tomtat LIKE '%em%' 
OR tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%'
i
CREATE VIEW vw_Music AS 
SELECT b.ma_bviet, b.tieude, b.ten_bhat, tg.ten_tgia, tl.ten_tloai 
FROM baiviet b 
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia 
JOIN theloai tl ON b.ma_tloai = tl.ma_tloai

SELECT * FROM vw_Music;

j
CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai VARCHAR(50))
BEGIN
    DECLARE TheLoaiID INT;
    SELECT ID INTO TheLoaiID FROM theloai WHERE Ten = ten_tloai;
    IF TheLoaiID IS NULL THEN
        SELECT 'Không tìm thấy thể loại' AS ThongBao;
    ELSE
        SELECT * FROM baiViet WHERE ma_tloai = TheLoaiID;
    END IF;
END;
k
ALTER TABLE theloai ADD SLBaiViet INT NOT NULL DEFAULT 0;
l
CREATE TABLE Users (
username varchar(50),
password varchar(50),
role boolean
 );

