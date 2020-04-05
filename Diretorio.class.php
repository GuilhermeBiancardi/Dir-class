<?php

class Diretorio {

    /**
     * Retorna o diretório atual
     * @return type
     */
    public function diretorioAtual() {
        return __DIR__;
    }

    private function listFileFolder($diretorio) {
        $arq = array();
        foreach ($diretorio as $file) {
            if (!$file->isDot() && $file->isDir()) {
                $dname = $file->getFilename();
                $arq[] = $dname;
            }
        }
        foreach ($diretorio as $file) {
            if ($file->isFile()) {
                $dname = $file->getFilename();
                $arq[] = $dname;
            }
        }
        return $arq;
    }

    private function listFileOnly($diretorio) {
        $arq = array();
        foreach ($diretorio as $file) {
            if ($file->isFile()) {
                $dname = $file->getFilename();
                $arq[] = $dname;
            }
        }
        return $arq;
    }

    private function listFolderOnly($diretorio) {
        $arq = array();
        foreach ($diretorio as $file) {
            if (!$file->isDot() && $file->isDir()) {
                $dname = $file->getFilename();
                $arq[] = $dname;
            }
        }
        return $arq;
    }

    private function listFileFolderSubFolder($diretorio, $diretorio_base) {
        foreach ($diretorio as $file) {
            if (!$file->isDot() && $file->isDir()) {
                $dname = $file->getFilename();
                $retorno = $this->listMethod($diretorio_base . '/' . $dname, 2);
                is_array($retorno) ? $arq[$dname] = $retorno : $arq[$dname] = array();
            }
        }
        foreach ($diretorio as $file) {
            if ($file->isFile()) {
                $dname = $file->getFilename();
                $arq[] = $dname;
            }
        }
        return $arq;
    }

    private function listType($diretorio, $tipo) {
        $arq = "";
        if ($tipo == "LIST_ALL") {
            // Listo Pastas e Arquivos
            $arq = $this->listFileFolder($diretorio);
        } else if ($tipo == "FILE_ONLY") {
            // Listo Apenas Arquivos
            $arq = $this->listFileOnly($diretorio);
        } else if ($tipo == "FOLDER_ONLY") {
            // Listo Apenas Pastas
            $arq = $this->listFolderOnly($diretorio);
        }
        return $arq;
    }

    /**
     * $nivel = THIS_FOLDER (Lista apenas a pasta atual)
     * $nivel = SUB_FOLDERS (Lista o diretorio atual + as sub pastas)
     * 
     * $tipo = FILE_ONLY (Lista apenas arquivos)
     * $tipo = FOLDER_ONLY (Lista apenas pastas)
     * $tipo = LIST_ALL (Lista os 2)
     *
     * @param DirectoryIterator $diretorio_base
     * @param int $nivel
     * @param int $tipo
     * @return array
     */
    public function listMethod($diretorio_base, $nivel = "THIS_FOLDER", $tipo = "LIST_ALL") {
        if (is_dir($diretorio_base)) {
            $diretorio = new DirectoryIterator($diretorio_base);
            if ($nivel == 1) {
                $arq = $this->listType($diretorio, $tipo);
            } else {
                $arq = $this->listFileFolderSubFolder($diretorio, $diretorio_base);
            }
            $dir = $arq;
            return $dir;
        } else {
            return "O Diretorio Informado nao Existe";
        }
    }

}

?>
