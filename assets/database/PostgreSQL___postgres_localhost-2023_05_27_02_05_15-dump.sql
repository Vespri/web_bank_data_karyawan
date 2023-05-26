--
-- PostgreSQL database dump
--

-- Dumped from database version 14.4
-- Dumped by pg_dump version 14.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: jabatan; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.jabatan AS ENUM (
    'Supervisor',
    'Officer',
    'Superintendent',
    'Manager'
);


ALTER TYPE public.jabatan OWNER TO postgres;

--
-- Name: jk; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.jk AS ENUM (
    'Laki-Laki',
    'Perempuan'
);


ALTER TYPE public.jk OWNER TO postgres;

--
-- Name: count_all_data(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.count_all_data() RETURNS TABLE(p_jabatan public.jabatan, p_karyawan bigint)
    LANGUAGE plpgsql
    AS $$
BEGIN
    return query

SELECT jabatan,COUNT(*) FROM data_karyawan GROUP BY jabatan;

END;
$$;


ALTER FUNCTION public.count_all_data() OWNER TO postgres;

--
-- Name: create_detail_gaji(integer, integer, integer, integer, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.create_detail_gaji(p_gaji_pokok integer, p_transport integer, p_tunjangan_keluarga integer, p_bpjs integer, p_id_karyawan character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE

    			p_id_detail_gaji varchar ;

				BEGIN

				p_id_detail_gaji = uuid_in(md5(random()::text || random()::text)::cstring)::varchar;


				INSERT INTO detail_gaji(id_detail_gaji, id_karyawan, gaji_pokok, transport, tunjangan_keluarga, bpjs)
				VALUES(p_id_detail_gaji, p_id_karyawan, p_gaji_pokok, p_transport, p_tunjangan_keluarga, p_bpjs);

				END;

$$;


ALTER FUNCTION public.create_detail_gaji(p_gaji_pokok integer, p_transport integer, p_tunjangan_keluarga integer, p_bpjs integer, p_id_karyawan character varying) OWNER TO postgres;

--
-- Name: create_karyawan(character varying, public.jk, public.jabatan, character varying, character varying, character varying, character varying, character varying, integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.create_karyawan(p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer) RETURNS character varying
    LANGUAGE plpgsql
    AS $$
DECLARE

    			p_id_karyawan varchar ;

				BEGIN

				p_id_karyawan = uuid_in(md5(random()::text || random()::text)::cstring)::varchar;


				INSERT INTO data_karyawan(id_karyawan, nama, jenis_kelamin, jabatan, alamat, agama, no_hp, email, status_pernikahan, total_gaji_akhir)
				VALUES(p_id_karyawan, p_nama, p_jenis_kelamin, p_jabatan, p_alamat, p_agama,  p_no_hp, p_email, p_status_pernikahan, p_total_gaji_akhir);

				return p_id_karyawan;
				END;

$$;


ALTER FUNCTION public.create_karyawan(p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer) OWNER TO postgres;

--
-- Name: delete_karyawan(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.delete_karyawan(p_id_karyawan character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN

DELETE FROM data_karyawan WHERE id_karyawan = p_id_karyawan;
DELETE FROM detail_gaji WHERE id_karyawan = p_id_karyawan;

END;
$$;


ALTER FUNCTION public.delete_karyawan(p_id_karyawan character varying) OWNER TO postgres;

--
-- Name: read_all_karyawan(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.read_all_karyawan() RETURNS TABLE(p_id_karyawan character varying, p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer, p_gaji_pokok integer, p_transport integer, p_tunjangan_keluarga integer, p_bpjs integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    return query
    SELECT
    data_karyawan.id_karyawan,
           data_karyawan.nama,
           data_karyawan.jenis_kelamin,
           data_karyawan.jabatan,
           data_karyawan.alamat,
           data_karyawan.agama,
           data_karyawan.no_hp,
           data_karyawan.email,
           data_karyawan.status_pernikahan,
           data_karyawan.total_gaji_akhir,
           dg.gaji_pokok,
           dg.transport,
           dg.tunjangan_keluarga,
           dg.bpjs
    FROM data_karyawan JOIN detail_gaji dg on data_karyawan.id_karyawan = dg.id_karyawan ORDER BY data_karyawan.nama asc;
END;
$$;


ALTER FUNCTION public.read_all_karyawan() OWNER TO postgres;

--
-- Name: read_karyawan_by_id(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.read_karyawan_by_id(param_id_karyawan character varying) RETURNS TABLE(p_id_karyawan character varying, p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    return query
    SELECT * FROM "data_karyawan" WHERE id_karyawan = param_id_karyawan;
END;
$$;


ALTER FUNCTION public.read_karyawan_by_id(param_id_karyawan character varying) OWNER TO postgres;

--
-- Name: update_detail_gaji(integer, integer, integer, integer, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_detail_gaji(p_gaji_pokok integer, p_transport integer, p_tunjangan_keluarga integer, p_bpjs integer, p_id_karyawan character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN

UPDATE "detail_gaji"
SET gaji_pokok = p_gaji_pokok, transport =  p_transport, tunjangan_keluarga =  p_tunjangan_keluarga, bpjs = p_bpjs WHERE id_karyawan = p_id_karyawan;



END
$$;


ALTER FUNCTION public.update_detail_gaji(p_gaji_pokok integer, p_transport integer, p_tunjangan_keluarga integer, p_bpjs integer, p_id_karyawan character varying) OWNER TO postgres;

--
-- Name: update_karyawan(character varying, public.jk, public.jabatan, character varying, character varying, character varying, character varying, character varying, integer, character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_karyawan(p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer, p_id_karyawan character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN

UPDATE "data_karyawan"
SET nama = p_nama, jenis_kelamin =  p_jenis_kelamin, jabatan =  p_jabatan, alamat = p_alamat, agama = p_agama, no_hp = p_no_hp, email = p_email, status_pernikahan = p_status_pernikahan, total_gaji_akhir = p_total_gaji_akhir WHERE id_karyawan = p_id_karyawan;



END
$$;


ALTER FUNCTION public.update_karyawan(p_nama character varying, p_jenis_kelamin public.jk, p_jabatan public.jabatan, p_alamat character varying, p_agama character varying, p_no_hp character varying, p_email character varying, p_status_pernikahan character varying, p_total_gaji_akhir integer, p_id_karyawan character varying) OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: data_karyawan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.data_karyawan (
    id_karyawan character varying(100) NOT NULL,
    nama character varying(30) NOT NULL,
    jenis_kelamin public.jk NOT NULL,
    jabatan public.jabatan NOT NULL,
    alamat character varying(255) NOT NULL,
    agama character varying(20) NOT NULL,
    no_hp character varying(15) NOT NULL,
    email character varying(50) NOT NULL,
    status_pernikahan character varying(100) NOT NULL,
    total_gaji_akhir integer NOT NULL
);


ALTER TABLE public.data_karyawan OWNER TO postgres;

--
-- Name: detail_gaji; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.detail_gaji (
    id_detail_gaji character varying(100) NOT NULL,
    id_karyawan character varying(100) NOT NULL,
    gaji_pokok integer NOT NULL,
    transport integer NOT NULL,
    tunjangan_keluarga integer NOT NULL,
    bpjs integer NOT NULL
);


ALTER TABLE public.detail_gaji OWNER TO postgres;

--
-- Data for Name: data_karyawan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.data_karyawan VALUES ('0b010939-5ecd-e1b6-291c-cb3d189b117d', 'Kresna Vespri', 'Laki-Laki', 'Superintendent', 'Palembang', 'Islam', '+628921732163', 'kresna@gmail.com', 'Belum Menikah', 17650000);
INSERT INTO public.data_karyawan VALUES ('3af7844c-fcc0-4ff4-b9d1-9c297ce6bae9', 'Budi', 'Laki-Laki', 'Officer', 'Palembang', 'Islam', '+628967856756', 'test@gmail.com', 'Menikah', 6550000);
INSERT INTO public.data_karyawan VALUES ('8e559960-bd77-10d6-d91e-1d50162ba058', 'Putri', 'Perempuan', 'Manager', 'Palembang', 'Islam', '+628931263236', 'test@gmail.com', 'Cerai Hidup', 23200000);
INSERT INTO public.data_karyawan VALUES ('59cb0d97-061c-5784-8297-a59001fca9cb', 'Agnes', 'Perempuan', 'Manager', 'Palembang', 'Islam', '+628213213663', 'test@gmail.com', 'Menikah', 23200000);


--
-- Data for Name: detail_gaji; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.detail_gaji VALUES ('34565a12-9f77-151c-6581-f5c2c25be91b', '0b010939-5ecd-e1b6-291c-cb3d189b117d', 14400000, 1250000, 2000000, 600000);
INSERT INTO public.detail_gaji VALUES ('73b8a7ed-f175-e959-3eda-433b85e84400', '3af7844c-fcc0-4ff4-b9d1-9c297ce6bae9', 4800000, 750000, 1000000, 200000);
INSERT INTO public.detail_gaji VALUES ('2bed80fd-4bce-4f99-678e-c164ef2bf29a', '8e559960-bd77-10d6-d91e-1d50162ba058', 19200000, 1500000, 2500000, 800000);
INSERT INTO public.detail_gaji VALUES ('77e3664b-59e1-47b8-be06-96750c677534', '59cb0d97-061c-5784-8297-a59001fca9cb', 19200000, 1500000, 2500000, 800000);


--
-- Name: data_karyawan data_karyawan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.data_karyawan
    ADD CONSTRAINT data_karyawan_pkey PRIMARY KEY (id_karyawan);


--
-- Name: detail_gaji detail_gaji_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detail_gaji
    ADD CONSTRAINT detail_gaji_pkey PRIMARY KEY (id_detail_gaji);


--
-- PostgreSQL database dump complete
--

