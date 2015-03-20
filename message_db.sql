--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: messages; Type: TABLE; Schema: public; Owner: tom; Tablespace: 
--

CREATE TABLE messages (
    id integer NOT NULL,
    text character varying
);


ALTER TABLE public.messages OWNER TO tom;

--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: tom
--

CREATE SEQUENCE messages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.messages_id_seq OWNER TO tom;

--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tom
--

ALTER SEQUENCE messages_id_seq OWNED BY messages.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tom
--

ALTER TABLE ONLY messages ALTER COLUMN id SET DEFAULT nextval('messages_id_seq'::regclass);


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: tom
--

COPY messages (id, text) FROM stdin;
\.


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tom
--

SELECT pg_catalog.setval('messages_id_seq', 15, true);


--
-- Name: messages_pkey; Type: CONSTRAINT; Schema: public; Owner: tom; Tablespace: 
--

ALTER TABLE ONLY messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

